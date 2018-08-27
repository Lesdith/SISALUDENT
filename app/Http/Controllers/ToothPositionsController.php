<?php

namespace IntelGUA\Sisaludent\Http\Controllers;

use Illuminate\Http\Request;
use IntelGUA\Sisaludent\Tooth_position;

class ToothPositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tooth_positions.index');
    }


    public function getToothPosition()
    {
        $tooth_positions = Tooth_position::orderby('id', 'DESC')->get();
        return $tooth_positions;

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

            $tooth_positions = Tooth_position::create($request->all());
            return $tooth_positions;

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

            $tooth_positions = Tooth_position::find($request->id);
            return response($tooth_positions);

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

            $tooth_positions = Tooth_position::find($request->id);
            $tooth_positions->update($request->all());
            return response($tooth_positions);

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
            Tooth_position::destroy($request->id);
            return redirect('tooth_positions')->with('status', 'Registro eliminado exitosamente');
        }
    }
}
