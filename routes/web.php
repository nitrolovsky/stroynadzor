<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/inspectors');
});


Route::get('/sync', function() {
    $inspectors_search = DB::table('inspectors')
        ->get();

    foreach ($inspectors_search as $inspector_search) {
        $inspectors = DB::connection('sqlsrv')
            ->table('am')
            ->where('lastname', $inspector_search->lastname)
            ->where('firstname', $inspector_search->firstname)
            ->where('middlename', $inspector_search->middlename)
            ->get();

        foreach ($inspectors as $inspector) {
            $inspector_object_ids[] = DB::connection('sqlsrv')
                ->table('ao')
                ->where('idfio', $inspector->id)
                ->get();
        }

        foreach ($inspector_object_ids as $inspector_object_id_i) {
            foreach ($inspector_object_id_i as $inspector_object_id) {
                $objects[] = DB::connection('sqlsrv')
                    ->table('hf')
                    ->where('idotvetstvennyj', $inspector_object_id->id)
                    ->where('entitynaznachenie', 'like', '%Жилье%')
                    ->orderBy('id', 'desc')
                    ->get();
            }
        }

        foreach ($objects as $object_i) {
            foreach ($object_i as $object) {

                $object_exists = DB::table('objects')
                    ->where('stroyform_id', $object->id)
                    ->first();

                if (empty($object_exists)) {

                    $resolution_first = DB::connection('sqlsrv')
                        ->table('pw')
                        ->where('type', 54)
                        ->where('identity', $object->id)
                        ->where('sstatus', 'not like', '%Документ изменен%')
                        ->where('sstatus', 'not like', '%Изменен%')
                        ->where('sstatus', 'not like', '%Отменен%')
                        ->where('sstatus', 'not like', '%Документ отменен%')
                        ->whereDate('dateto', '>=', date('Y-m-d'))
                        ->first();

                    $resolution_renewal = DB::connection('sqlsrv')
                        ->table('pw')
                        ->where('type', 54)
                        ->where('identity', $object->id)
                        ->where('sstatus', 'not like', '%Документ изменен%')
                        ->where('sstatus', 'not like', '%Изменен%')
                        ->where('sstatus', 'not like', '%Отменен%')
                        ->where('sstatus', 'not like', '%Документ отменен%')
                        ->whereDate('datefrom', '>=', date('Y-m-d'))
                        ->first();

                    if (!empty($resolution_first) AND !empty($resolution_renewal)) {
                        if ($resolution_first->dateto > $resolution_renewal->datefrom) {
                            $resolution = $resolution_first;
                            unset($resolution_first);
                        } else {
                            $resolution = $resolution_renewal;
                            unset($resolution_renewal);
                        }
                    } else {
                        if (!empty($resolution_first)) {
                            $resolution = $resolution_first;
                            unset($resolution_first);
                        }
                        if (!empty($resolution_renewal)) {
                            $resolution = $resolution_renewal;
                            unset($resolution_renewal);
                        }
                    }

                    if (!empty($resolution)) {

                        $developer = DB::connection('sqlsrv')
                            ->table('au')
                            ->where('identity', $object->id)
                            ->where('idappointment', 1197)
                            ->first();

                        if (!empty($developer)) {
                            $developer_name = DB::connection('sqlsrv')
                                ->table('ae')
                                ->where('id', $developer->idcompany)
                                ->first();

                            if (empty($developer_name)) {
                                $developer_name = DB::connection('sqlsrv')
                                    ->table('ae')
                                    ->where('id', $resolution->idcompany)
                                    ->first();
                            }
                        }

                        if (empty($developer_name)) {
                            $developer_name = new \stdClass();
                            $developer_name->nazvanie = '';
                        }

                        DB::table('objects')
                            ->insert([
                                'address' => $object->saddress,
                                'stroyform_id' => $object->id,
                                'resolution_number' => $resolution->snumber,
                                'resolution_deadline' => $resolution->dateto,
                                'inspector_id' => $inspector_search->id,
                                'created_at' => \Carbon\Carbon::now(),
                                'updated_at' => \Carbon\Carbon::now(),
                                'developer_name' => $developer_name->nazvanie,
                                'zone' => $inspector_search->zone
                            ]);
                        unset($resolution);

                        $notice = DB::connection('sqlsrv')
                            ->table('pw')
                            ->where('type', 10001)
                            ->where('identity', $object->id)
                            ->first();

                        if (!empty($notice)) {
                            DB::table('objects')
                                ->where('stroyform_id', $object->id)
                                ->update([
                                    'notice_date_added' => $notice->datecreate
                                ]);
                        } else {
                            $checklist = DB::connection('sqlsrv')
                                ->table('pw')
                                ->where('type', 67)
                                ->where('identity', $object->id)
                                ->first();

                            if (!empty($checklist)) {
                                DB::table('objects')
                                    ->where('stroyform_id', $object->id)
                                    ->update([
                                        'checklist_date_added' => $checklist->datecreate
                                    ]);
                            }
                        }

                        $ob = DB::table('objects')
                            ->where('stroyform_id', $object->id)
                            ->first();

                        $video = DB::connection('sqlsrv')
                            ->table('bg')
                            ->where('type', 308)
                            ->where('identity', $object->id)
                            ->first();

                        if (!empty($video)) {
                            DB::table('objects')
                                ->where('id', $ob->id)
                                ->update([
                                    'video_url' => $video->nazvanie,
                                    'status' => 'Видеотрансляция добавлена в Стройформ',
                                    'status_start' => \Carbon\Carbon::now()
                                ]);
                        }

                        if (empty($video)) {
                            if(empty($ob->notice_date_added) AND empty($ob->checklist_date_added)) {
                                DB::table('objects')
                                    ->where('id', $ob->id)
                                    ->update([
                                        'status' => 'Строительство не начато',
                                        'status_start' => \Carbon\Carbon::now()
                                    ]);
                            } else {
                                DB::table('objects')
                                    ->where('id', $ob->id)
                                    ->update([
                                        'status' => 'Необходимо добавить видеотрансляцию',
                                        'status_start' => \Carbon\Carbon::now()
                                    ]);
                            }
                        }
                    }

                    if (($object->iactivitystate == 4) OR ($object->iactivitystate == 6)) {
                        $object_data = App\Object::where('stroyform_id', $object->id);
                        $object_data->delete();
                    }

                } else {


                }
            }
        }
    }

});

Route::get('/stat', function() {
    $inspectors = DB::table('inspectors')
        ->get();
    $objects = DB::table('objects')
        ->get();

    $stat = array();

    $stat[0]['objects'] = DB::table('objects')
        ->count();
    $stat[0]['video'] = DB::table('objects')
        ->where('status', 'Видеотрансляция добавлена в Стройформ')
        ->count();
    $stat[0]['no_start'] = DB::table('objects')
        ->where('status', 'Строительство не начато')
        ->count();
    $stat[0]['need_video'] = DB::table('objects')
        ->where('status', 'Необходимо добавить видеотрансляцию')
        ->count();

    foreach ($inspectors as $inspector) {
        $stat[$inspector->id]['objects'] = DB::table('objects')
            ->where('inspector_id', $inspector->id)
            ->count();
        $stat[$inspector->id]['video'] = DB::table('objects')
            ->where('status', 'Видеотрансляция добавлена в Стройформ')
            ->where('inspector_id', $inspector->id)
            ->count();
        $stat[$inspector->id]['no_start'] = DB::table('objects')
            ->where('status', 'Строительство не начато')
            ->where('inspector_id', $inspector->id)
            ->count();
        $stat[$inspector->id]['need_video'] = DB::table('objects')
            ->where('status', 'Необходимо добавить видеотрансляцию')
            ->where('inspector_id', $inspector->id)
            ->count();
    }

    return view('users.stat')
        ->with('inspectors', $inspectors)
        ->with('objects', $objects)
        ->with('stat', $stat);
});

Route::post('objects/addvideo', 'ObjectController@addvideo');
Route::post('objects/request_mounting', 'ObjectController@request_mounting');
Route::get('objects/right', 'ObjectController@right');
Route::get('objects/left', 'ObjectController@left');
Route::get('requests', 'ObjectController@requests');
Route::resource('objects', 'ObjectController');
Route::resource('inspectors', 'InspectorController');
