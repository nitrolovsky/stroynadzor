<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Object;
use App\Inspectors;

class InspectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inspectors = DB::table('inspectors')
            ->get();
        $objects = Object::get();

        $stat = array();

        $stat[0]['objects'] = Object::get()->count();
        $stat[0]['video'] = Object::get()->where('status', 'Видеотрансляция добавлена в Стройформ')->count();
        $stat[0]['no_start'] = Object::get()->where('status', 'Строительство не начато')->count();
        $stat[0]['need_video'] = Object::get()->where('status', 'Необходимо добавить видеотрансляцию')->count();

        $stat['left']['objects'] = Object::get()->where('zone', 'Левобережная')->count();
        $stat['left']['video'] = Object::get()->where('status', 'Видеотрансляция добавлена в Стройформ')->where('zone', 'Левобережная')->count();
        $stat['left']['no_start'] = Object::get()->where('status', 'Строительство не начато')->where('zone', 'Левобережная')->count();
        $stat['left']['need_video'] = Object::get()->where('status', 'Необходимо добавить видеотрансляцию')->where('zone', 'Левобережная')->count();

        $stat['right']['objects'] = Object::get()->where('zone', 'Правобережная')->count();
        $stat['right']['video'] = Object::get()->where('zone', 'Правобережная')->where('status', 'Видеотрансляция добавлена в Стройформ')->count();
        $stat['right']['no_start'] = Object::get()->where('zone', 'Правобережная')->where('status', 'Строительство не начато')->count();
        $stat['right']['need_video'] = Object::get()->where('zone', 'Правобережная')->where('status', 'Необходимо добавить видеотрансляцию')->count();

        foreach ($inspectors as $inspector) {
            $stat[$inspector->id]['objects'] = Object::get()
                ->where('inspector_id', $inspector->id)
                ->count();
            $stat[$inspector->id]['video'] = Object::get()
                ->where('status', 'Видеотрансляция добавлена в Стройформ')
                ->where('inspector_id', $inspector->id)
                ->count();
            $stat[$inspector->id]['no_start'] = Object::get()
                ->where('status', 'Строительство не начато')
                ->where('inspector_id', $inspector->id)
                ->count();
            $stat[$inspector->id]['need_video'] = Object::get()
                ->where('status', 'Необходимо добавить видеотрансляцию')
                ->where('inspector_id', $inspector->id)
                ->count();
        }

        return view('users.inspectors')
            ->with('inspectors', $inspectors)
            ->with('objects', $objects)
            ->with('stat', $stat);
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
        $inspector = DB::table('inspectors')
            ->where('id', $id)
            ->first();

        $objects = Object::where('inspector_id', $id)
            ->get();

        if (!empty($objects)) {
            return view('users.inspector')
                ->with('objects', $objects)
                ->with('inspector', $inspector);

        } else {
            echo 'Объектов с действующим разрешением нету.';
        }
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

    public function insert_videobroadcast($id)
    {

    }
}
