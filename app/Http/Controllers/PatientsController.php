<?php

namespace IntelGUA\Sisaludent\Http\Controllers;

use IntelGUA\Sisaludent\Patient;
use IntelGUA\Sisaludent\Location;
use IntelGUA\Sisaludent\Gender;
use IntelGUA\Sisaludent\Municipality;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return \IntelGUA\Sisaludent\Patient
     */
    public function index()
    {
           return view('patients.index');
    }

     public function getPatients()
    {
        $patients = Patient::with("gender")->with("location")->with("municipality")->orderby('id', 'DESC')->get();
        return (compact('patients'));
    }

    public function getGender()
    {
        $genders = Gender::orderby('id', 'DESC')->get();
        return $genders;
    }

    public function getLocation()
    {
        $locations = Location::orderby('id', 'DESC')->get();
        return $locations;
    }


    public function getMunicipality()
    {
        $municipalities = Municipality::orderby('id', 'DESC')->get();
        return $municipalities;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @return \IntelGUA\Sisaludent\Patient
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
            $patient = Patient::create ($request->all());

            //Para cargar la Imagen

                  if ($request->hasFile('file')) {
                    $destinationPath="image";
                    $file=$request->file;
                    $extension=$file->getClientOriginalExtension();
                    $fileName=rand(1111,9999).".".$extension;
                    $path = $file->move($destinationPath, $fileName);
                    $patient->file=$path;
                    $patient->save();

            }
            return $request;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \IntelGUA\Sisaludent\Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patients = Patient::find($id);
        return view('patient.show', ['patient'=>$patients]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \IntelGUA\Sisaludent\Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
         if ($request->ajax()) {

            $patient = Patient::find($request->id);
            return response($patient);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \IntelGUA\Sisaludent\Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->ajax()) {

            $patient = Patient::find($request->id);

             if ($request->hasFile('file')) {
                    $destinationPath="image";
                    $file=$request->file;
                    $extension=$file->getClientOriginalExtension();
                    $fileName=rand(1111,9999).".".$extension;
                    $path = $file->move($destinationPath, $fileName);
                    $patient->file=$path;
                    $patient->update();

            }
            $patient->update($request->all());
            return response($patient);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        if ($request->ajax()) {
        $patient = Patient::findOrFail($id);
        $patient->delete();
            return redirect('patients')->with('success', 'Paciente se dió de baja');
        }
            return redirect('patients')->with('fail', 'Operación cancelada');
    }

}
