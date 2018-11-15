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

    public function crearPlan($id)
    {
        $patient = Patient::where('id', $id)->first();
        return view('plans.index', compact('patient'));
            //return(compact('patient'));
    }


    public function getDiente()
    {
        $diente = Tooth::with('tooth_stage')->with('tooth_type')->with('tooth_position')->orderby('id', 'ASC')->get();
        return $diente;
    }

    public function getDiagnostico()
    {
        $diagnostico = Diagnosis::orderby('id', 'DESC')->get();
        return $diagnostico;
    }

    public function getTratamiento()
    {
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

       // var_dump($data);
        if ($request->ajax()) {
            $return = (object)[
                'response' => false
            ];
            DB::beginTransaction();

            try {
                $data = (object)[
                    'patient_id' => $request->input('patient_id'),
                    'date' => $request->input('date'),
                    'subtotal' => $request->input('subtotal'),
                    'discount' => $request->input('discount'),
                    'total' => $request->input('total'),
                    'detail' => [],
                ];


                foreach ($request->input('detail') as $d) {
                    $data->detail[] = (object)[
                        'tooth_id' => $d['tooth_id'],
                        'diagnosis_id' => $d['diagnosis_id'],
                        'tooth_treatment_id' => $d['tooth_treatment_id'],
                        'cost' => $d['cost'],
                        'description' => $d['description'],
                    ];
                }


                $treatment_plan = new Treatment_plan();
                $treatment_plan->patient_id = $data->patient_id;
                $treatment_plan->date = $data->date;
                $treatment_plan->subtotal = $data->subtotal;
                $treatment_plan->discount = $data->discount;
                $treatment_plan->total = $data->total;
                $treatment_plan->save();

                $details = [];
                foreach ($data->detail as $d) {
                    $obj = new Detail_treatment_plan();

                    $obj->tooth_id = $d->tooth_id;
                    $obj->diagnosis_id = $d->diagnosis_id;
                    $obj->tooth_treatment_id = $d->tooth_treatment_id;
                    $obj->cost = $d->cost;
                    $obj->description = $d->description;

                    $detail[] = $obj;
                }
                $treatment_plan->detail_treatment_plans()->saveMany($detail);
                $return->response = true;


                // $dataSet = [];
                // foreach ((array)$request->order as $detail) {

                //     $dataSet[] = [
                //         'tooth_id' => $detail['tooth_id'],
                //         'diagnosis_id' => $detail['diagnosis_id'],
                //         'tooth_treatment_id' => $detail['tooth_treatment_id'],
                //         'cost' => $detail['cost'],
                //         'description' => $detail['description'],
                //     ];

                // }
        
                
               // $this->output->enable_profiler(true);
                // DB::table('detail_treatment_plans')->insert([
                //     'treatment_plan_id' => 4,
                //     'tooth_id' => $request->orderArr['tooth_id'],
                //     'diagnosis_id' => $request->orderArr['diagnosis_id'],
                //     'tooth_treatment_id' => $request->orderAr['tooth_treatment_id'],
                //     'cost' => $request->orderAr['cost'],
                //     'description' => $request->orderAr['description']
                // ]);

                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
            }
            return json_encode($return);
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
