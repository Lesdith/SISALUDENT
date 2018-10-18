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
        $teeth = Tooth::with("tooth_type")->with("tooth_stage")->with("tooth_position")->orderby('id', 'DESC')->get();
        return (compact('teeth'));
    }

     public function getTooth($id)
    {
        $teeth = Tooth::findOrFail($id);
        return $teeth;
    }

    //    public function getToothShow($id)
    // {
    //     $teeth = Tooth::findOrFail($id);
    //     return $teeth;
    // }
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
            return $request;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \IntelGUA\Sisaludent\Tooth  $tooth
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teeth = Tooth::find($id);
        return view('tooth.show', ['tooth'=>$teeth]);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \IntelGUA\Sisaludent\Tooth  $tooth
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if ($request->ajax()) {

            $tooth = Tooth::find($request->id);
            return response($tooth);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \IntelGUA\Sisaludent\Tooth  $tooth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
    public function destroy(Request $request, $id)
    {

    if ($request->ajax()) {
    $tooth = Tooth::findOrFail($id);
    $tooth->delete();
   return redirect('teeth')->with('success', 'Diente eliminado exitosamente');
    }
    return redirect('teeth')->with('fail', 'Diente eliminado exitosamente');
    }

}
