<?php

namespace IntelGUA\Sisaludent\Http\Controllers;

use Illuminate\Http\Request;
use IntelGUA\Sisaludent\Tooth_type;

class ToothTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tooth_types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }


    public function getToothType()
    {
        $tooth_types = Tooth_type::orderby('id', 'DESC')->get();
        return $tooth_types;

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
        if ($request->ajax()) {

            $tooth_types = Tooth_type::create($request->all());
            return $tooth_types;

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
        if ($request->ajax()) {

            $tooth_types = Tooth_type::find($request->id);
            return response($tooth_types);

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

            $tooth_types = Tooth_type::find($request->id);
            $tooth_types->update($request->all());
            return response($tooth_types);

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
            Tooth_type::destroy($request->id);
            return redirect('tooth_types')->with('status', 'Registro eliminado exitosamente');
        }
    }
}
