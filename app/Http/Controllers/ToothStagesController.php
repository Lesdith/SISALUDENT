<?php

namespace IntelGUA\Sisaludent\Http\Controllers;

use Illuminate\Http\Request;
use IntelGUA\Sisaludent\Tooth_stage;

class ToothStagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tooth_stages.index');
    }

    public function getToothStage()
    {
        $tooth_stages = Tooth_stage::orderby('id', 'DESC')->get();
        return $tooth_stages;

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
        if ($request->ajax()) {

            $tooth_stages = Tooth_stage::create($request->all());
            return $tooth_stages;

        }
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
        if ($request->ajax()) {

            $tooth_stages = Tooth_stage::find($request->id);
            return response($tooth_stages);

        }
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
        if ($request->ajax()) {

            $tooth_stages = Tooth_stage::find($request->id);
            $tooth_stages->update($request->all());
            return response($tooth_stages);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($request->ajax()) {
            Tooth_stage::destroy($request->id);
            return redirect('tooth_stages')->with('status', 'Registro eliminado exitosamente');
        }
    }
}
