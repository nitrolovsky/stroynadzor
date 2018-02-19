<?php

namespace App\Http\Controllers;

use Request;
use Redirect;
use DB;

use App\Object;
use App\Inspector;

class ObjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function right()
    {
        $inspectors = Inspector::all()->toArray();

        $objects = Object::where('zone', 'Правобережная')
            ->get();

        if (!empty($objects)) {
            return view('objects.right')
                ->with('objects', $objects)
                ->with('inspectors', $inspectors);

        } else {
            echo 'Объектов с действующим разрешением нету.';
        }
    }

    public function left()
    {
        $inspectors = Inspector::all()->toArray();

        $objects = Object::where('zone', 'Левобережная')
            ->get();

        if (!empty($objects)) {
            return view('objects.left')
                ->with('objects', $objects)
                ->with('inspectors', $inspectors);

        } else {
            echo 'Объектов с действующим разрешением нету.';
        }
    }

    public function addvideo()
    {
        $object = Object::find(Request::get("id"));

        $object->video_url = Request::get('video_url');
        $object->status = 'Видеотрансляция добавлена в Стройформ';
        $object->save();

        $video = DB::connection('sqlsrv')
            ->table('bg')
            ->insert([
                'type' => 308,
                'identity' => $object->stroyform_id,
                'nazvanie' => Request::get('video_url')
            ]);

        return Redirect::to("/inspectors/$object->inspector_id");
    }

    public function request_mounting()
    {
        $object = Object::find(Request::get("id"));

        $object->status = 'Смонтировать камеру Службы';
        $object->status_request = 'Смонтировать камеру Службы';
        $object->status_request_start = \Carbon\Carbon::now();
        $object->contact_fio = Request::get('contact_fio');
        $object->contact_phone = Request::get('contact_phone');
        $object->contact_email = Request::get('contact_email');
        $object->note = Request::get('note');

        $object->save();

        return Redirect::to("/inspectors/$object->inspector_id");
    }

    public function requests()
    {
        $objects = Object::whereNotNull('status_request_start')
            ->orderBy('status_request_start', 'desc')
            ->get();

        $inspectors = Inspector::all()->toArray();

        return view('objects.requests')
            ->with('objects', $objects)
            ->with('inspectors', $inspectors);
    }
}
