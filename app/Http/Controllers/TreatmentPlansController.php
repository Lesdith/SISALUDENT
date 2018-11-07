<?php

namespace IntelGUA\Sisaludent\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use IntelGUA\Sisaludent\Patient;
use IntelGUA\Sisaludent\Tooth;
use IntelGUA\Sisaludent\Tooth_stage;
use IntelGUA\Sisaludent\Tooth_type;
use IntelGUA\Sisaludent\Tooth_position;
use IntelGUA\Sisaludent\Diagnosis;
use IntelGUA\Sisaludent\Tooth_treatment;
use IntelGUA\Sisaludent\Treatment_plan;
use IntelGUA\Sisaludent\Detail_treatment_plan;
use Illuminate\Support\Facades\DB;



class TreatmentPlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    public function crearPlan($id){
            $patient = Patient::where('id', $id)->first();
            return view('plans.index', compact('patient'));
            //return(compact('patient'));
    }


    public function getDiente()
    {
        $diente = Tooth::with('tooth_stage')->with('tooth_type')->with('tooth_position')->orderby('id', 'ASC')->get();
        return $diente;
    }

    public function getDiagnostico(){
        $diagnostico = Diagnosis::orderby('id', 'DESC')->get();
        return $diagnostico;
    }

    public function getTratamiento(){
        $tratamiento = Tooth_treatment::orderby('id', 'DESC')->get();
        return $tratamiento;
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
            DB::beginTransaction();

            try {
            $treatment_plan = new Treatment_plan();
            $treatment_plan->patient_id    = $request->patient_id;
            $treatment_plan->date          = $request->date;
            $treatment_plan->subtotal      = $request->subtotal;
            $treatment_plan->discount     = $request->discount;
            $treatment_plan->total        = $request->total;
            $treatment_plan->save();


            foreach ($request->order as $detail){
                $detail_plan = new Detail_treatment_plan;

                $detail_plan->treatment_plan_id     = $treatment_plan->id;
                $detail_plan->tooth_id              = $detail['tooth_id_array'];
                $detail_plan->diagnosis_id          = $detail['diagnosis_id_array'];
                $detail_plan->tooth_treatment_id    = $detail['tooth_treatment_id_array'];
                $detail_plan->cost                  = $detail['cost_array'];
                $detail_plan->description           = $detail['description_array'];
                $detail_plan->save();

            }
            DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                }
         return $request;
         //return Response::json(['data'=>$treatment_plan->id]);
            // return Json($result, JsonRequestBehavior.AllowGet);
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
}
