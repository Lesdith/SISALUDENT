<?php

namespace IntelGUA\Sisaludent\Http\Controllers;


use IntelGUA\Sisaludent\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('events.index');


    //     $events         = Event::get();
    //     $event_list     =[];
    //     foreach($events as $key => $event){
    //         $event_list[] = Calendar::event(
    //             $event->contact,
    //             // $event->phone,
    //             true,
    //             new \DateTime($event->start_date),
    //             new \DateTime($event->end_date)
    //         );
    //     }
    //     $calendar_details = Calendar::addEvents($event_list);

    //    return view('events.index', compact('calendar_details'));
    }

    public function get_events(){

        $events = Event::selectRaw('CONCAT(contact,"   ", phone) as title, id, start_date as start, end_date as end')->get()->toArray();

        return response()->json($events);
    }

    public function getEvent($id){

        $event = Event::Where('id', $id)->get();
        return $event;
    }
    // Tenant::selectRaw('CONCAT(First_Name, " ", Last_Name) as TenantFullName, id')->orderBy('First_Name')->lists('TenantFullName', 'id'))


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

            $event = Event::create($request->all());
            return $request;

        }
        // $validator = Validator::make($request->all(),[
        //     'contact'       => 'required',
        //     'phone'       => 'required',
        //     'start_date'   => 'required',
        //     'end_date'     => 'required'
        // ]);
        // if ($validator->fails()){
        //     \Session::flash('warning', 'Por favor ingrese datos validos');
        //      return redirect()->back()
        //             ->withInput($request->all())
        //             ->withErrors($validator);
        //              }
        // $event = new Event;
        // $event->contact    = $request['contact'];
        //  $event->phone    = $request['phone'];
        // $event->start_date  = $request['start_date'];
        // $event->end_date   = $request['end_date'];
        // $event->save();
        // \Session::flash('success','Se creo la cita.');
        // return Redirect::to('/events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
        {
            //...
        }

         public function getEventOptions()
            {
                // return [
                //     'color' => $this->background_color,
                //     //etc
                // ];
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
        if ($request->ajax()) {

            $event = Event::find($request->id);
            $event->update($request->all());
            return response($event);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
            if ($request->ajax()) {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect('events')->with('success', 'Cita eliminada exitosamente');
        }
        return redirect('events')->with('fail', 'Operación cancelada');
    }
 }
