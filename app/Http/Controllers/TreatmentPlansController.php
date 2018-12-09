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
use PDF;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;



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

    public function getPlans($id)
    {
        $plans = Treatment_plan::where('patient_id', '=', $id)->orderby('date', 'DESC')->get();
        return (compact('plans'));

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
                $treatment_plan->date = Carbon::parse($data->date)->format('Y/m/d');
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
                $return->response = $treatment_plan->id;

                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
            }
            //var_dump($treatment_plan->patient_id);
           //// exit;
           // return Redirect::to('../patients/' . $treatment_plan->patient_id);
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
        $plan = Treatment_plan::with(
            'detail_treatment_plans',
            'patient',
            'detail_treatment_plans.tooth',
            'detail_treatment_plans.diagnosis',
            'detail_treatment_plans.tooth_treatment',
            'detail_treatment_plans.tooth.tooth_type',
            'detail_treatment_plans.tooth.tooth_stage',
            'detail_treatment_plans.tooth.tooth_position'
        )->find($id);
        return view('plans.edit', compact('plan'));
        //return (compact('plan'));
    }

    public function pdf($id)
    {
        $plan = Treatment_plan::with(
            'detail_treatment_plans',
            'patient',
            'detail_treatment_plans.tooth',
            'detail_treatment_plans.diagnosis',
            'detail_treatment_plans.tooth_treatment',
            'detail_treatment_plans.tooth.tooth_type',
            'detail_treatment_plans.tooth.tooth_stage',
            'detail_treatment_plans.tooth.tooth_position'
        )->find($id);

        $nombre_comprobante = sprintf('Presupuesto-%s.pdf', str_pad($plan->id, 7, '0', STR_PAD_LEFT));
        $pdf = PDF::loadView('plans.pdf', compact('plan'));
        // $treatment_name = sprintf('Presupuesto-%s.pdf', str_pad($treatment_plant->id, 7, '0', STR_PAD_LEfT));
        // $pdf = PDF::loadView('plans.pdf', []);
        //return view('plans.pdf', compact('plan'));
        //return (compact('plan'));
        return $pdf->stream($nombre_comprobante);
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

    public function odontogram()
    {
        return view('plans.odontograma');
    }
}
