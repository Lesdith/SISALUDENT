<?php

namespace IntelGUA\Sisaludent\Http\Controllers;

use IntelGUA\Sisaludent\Patient;
use IntelGUA\Sisaludent\Clinic_history;
use IntelGUA\Sisaludent\Dental_history;
use IntelGUA\Sisaludent\Location;
use IntelGUA\Sisaludent\Gender;
use IntelGUA\Sisaludent\Department;
use IntelGUA\Sisaludent\Municipality;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;


class PatientsController extends Controller
{
    // public function __construct(){
    //     $this->middleware('permission:todos')->only(['create', 'store', 'index', 'edit', 'update']);
    //     $this->middleware('permission:pacientes')->only(['create', 'store', 'index', 'edit', 'update']);
    // }
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


    public function getDepartment()
    {
        $departments = Department::orderby('id', 'DESC')->get();
        return $departments;
    }
     public function getMunicipality($id)
    {
        $municipalities = Municipality::Where('department_id', $id)->get();
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
            // $patient = Patient::create ($request->all());

            DB::beginTransaction();
            try {
                $patient = new Patient();
                $patient->names             = $request->input('names');
                $patient->surnames          = $request->input('surnames');
                $patient->gender_id         = $request->input('gender_id');
                $patient->birth_date        = $request->input('birth_date');
                $patient->location_id       = $request->input('location_id');
                $patient->address           = $request->input('address');
                $patient->municipality_id   = $request->input('municipality_id');
                $patient->phone_number      = $request->input('phone_number');
                $patient->save();

                $clinic_history = new Clinic_history();
                $clinic_history->patient_id            = $patient->id;
                if($request->infectious_disease == 'on'){
                    $clinic_history->infectious_disease = 1;
                }
                $clinic_history->disease_name          = $request->input('disease_name');

                if($request->cardiac == 'on'){
                    $clinic_history->cardiac = 1;
                }

                if($request->allergic == 'on'){
                    $clinic_history->allergic = 1;
                }

                $clinic_history->what_you_allergy      = $request->input('what_you_allergy');

                if($request->diabetic == 'on'){
                    $clinic_history->diabetic = 1;
                }

                if($request->pregnant == 'on'){
                    $clinic_history->pregnant = 1;
                }

                if($request->epileptic == 'on'){
                    $clinic_history->epileptic = 1;
                }
                $clinic_history->save();



                $dental_history = new Dental_history();
                $dental_history->patient_id            = $patient->id;


                if($request->dental_hemorrhage == 'on'){
                    $dental_history->dental_hemorrhage = 1;
                }

                if($request->mouth_infections == 'on'){
                    $dental_history->mouth_infections = 1;
                }

                if($request->mouth_ulcers == 'on'){
                    $dental_history->mouth_ulcers = 1;
                }

                if($request->reaction_anesthesia == 'on'){
                    $dental_history->reaction_anesthesia = 1;
                }

                $dental_history->what_reaction              = $request->input('what_reaction');

                if($request->toothache == 'on'){
                    $dental_history->toothache = 1;
                }
                $dental_history->save();

            DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
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
        $patient = DB:: table('patients')
        ->leftJoin('genders'         , 'genders.id' ,           '=', 'patients.gender_id')
        ->leftJoin('locations'       , 'locations.id',          '=', 'patients.location_id')
        ->leftJoin('municipalities'  , 'municipalities.id',     '=', 'patients.municipality_id')
        ->leftJoin('departments'     , 'departments.id',        '=', 'municipalities.department_id')
        ->leftJoin('clinic_histories', 'patients.id',           '=', 'clinic_histories.patient_id')
        ->leftJoin('dental_histories', 'patients.id',           '=', 'dental_histories.patient_id')
        ->where('patients.id', '=', $id)->orWhere('municipality_id', '=', 'null')
        ->select('patients.*', 'clinic_histories.*', 'dental_histories.*',
                 'genders.name as gender', 'locations.name as location',
                 'municipalities.name as municipality', 'departments.name as department', 'clinic_histories.id as clinic_history', 'dental_histories.id as dental_history')
        ->first();
        return view('patients.show',compact('patient'));
        //return (compact('patient'));

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

            $patient = Patient::with("municipality")->find($request->id);
            return response($patient);
            //return $patient;

        }
    }

    public function editClinic(Request $request, $id)
    {
         if ($request->ajax()) {

            $clinic = Clinic_history::find($request->id);
             return response($clinic);

            //return $clinic;

        }
    }

     public function editDental(Request $request, $id)
    {
         if ($request->ajax()) {

            $dental = Dental_history::find($request->id);
             return response($dental);
           // return $dental;
        }
    }
    //  public function editar(Request $request, $id)
    // {
    //      if ($request->ajax()) {

    //         $patient = Patient::find($request->id);
    //         return response($patient);

    //     }
    // }

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

            //  if ($request->hasFile('file')) {
            //         $destinationPath="image";
            //         $file=$request->file;
            //         $extension=$file->getClientOriginalExtension();
            //         $fileName=rand(1111,9999).".".$extension;
            //         $path = $file->move($destinationPath, $fileName);
            //         $patient->file=$path;
            //         $patient->update();

            }
            $patient->update($request->all());
            return response($patient);
    }

     public function updateDental(Request $request, $id)
    {

        if ($request->ajax()) {

            $dental = Dental_history::find($request->id);

            }
            $dental->update($request->all());
            return response($dental);
    }


    public function updateClinic(Request $request, $id)
    {

        if ($request->ajax()) {

            $clinic = Clinic_history::find($request->id);

            }
            $clinic->update($request->all());
            return response($clinic);
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