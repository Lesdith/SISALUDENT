<?php

namespace IntelGUA\Sisaludent\Http\Controllers;

use IntelGUA\Sisaludent\Tooth;
use IntelGUA\Sisaludent\Tooth_type;
use IntelGUA\Sisaludent\Tooth_stage;
use IntelGUA\Sisaludent\Tooth_position;
use Illuminate\Http\Request;

class TeethController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teeth.index');
    }

    public function getTeeth()
    {
        $teeth = Tooth::orderby('id', 'DESC')->get();
        $tooth_types = Tooth_type::orderBy('id', 'DESC')->get();
        $tooth_positions = Tooth_position::orderBy('id', 'DESC')->get();
        $tooth_stages = Tooth_stage::orderBy('id', 'DESC')->get();
        return $teeth;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

            $teeth = Tooth::create($request->all());
            $tooth_types = Tooth_type::create($request->all());
            $tooth_positions = Tooth_type::create($request->all());
            return $teeth;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \IntelGUA\Sisaludent\Tooth  $tooth
     * @return \Illuminate\Http\Response
     */
    public function show(Tooth $tooth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \IntelGUA\Sisaludent\Tooth  $tooth
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if ($request->ajax()) {

            $teeth = Tooth::find($request->id);
            return response($teeth);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \IntelGUA\Sisaludent\Tooth  $tooth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {

            $teeth = Tooth::find($request->id);
            $teeth->update($request->all());
            return response($teeth);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \IntelGUA\Sisaludent\Tooth  $tooth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            Teeth::destroy($request->id);
            return redirect('teeth')->with('status', 'Diente eliminado exitosamente');
        }
    }
}
