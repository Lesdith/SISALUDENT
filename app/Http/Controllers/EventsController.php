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
        $events         = Event::get();
        $event_list     =[];
        foreach($events as $key => $event){
            $event_list[] = Calendar::event(
                $event->contacto,
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date)
            );
        }
        $calendar_details = Calendar::addEvents($event_list);

       return view('events.index', compact('calendar_details'));
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
        $validator = Validator::make($request->all(),[
            'contact'       => 'required',
            'telefono'      => 'required',
            'start_date'   => 'required',
            'end_date'     => 'required'
        ]);
        if ($validator->fails()){
            \Session::flash('warning', 'Por favor ingrese datos validos');
             return redirect()->back()
                    ->withInput($request->all())
                    ->withErrors($validator);
                     }
        $event = new Event;
        $event->contacto    = $request['contact'];
        $event->telefono    = $request['telefono'];
        $event->start_date  = $request['start_date'];
        $event->end_date   = $request['end_date'];
        $event->save();
        \Session::flash('success','Se creo la cita.');
        return Redirect::to('/events');
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
                return [
                    'color' => $this->background_color,
                    //etc
                ];
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






// class EventsController extends Controller
// {
//     public function index(){
//     	$events = Event::get();
//     	$event_list = [];
//     	foreach ($events as $key => $event) {
//     		$event_list[] = Calendar::event(
//                 $event->contacto,
//                 true,
//                 new \DateTime($event->start_date),
//                 new \DateTime($event->end_date.' +1 day')
//             );
//     	}
//     	$calendar_details = Calendar::addEvents($event_list);

//         return view('events', compact('calendar_details') );
//     }

//     public function addEvent(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'contacto'   => 'required',
//             'telefono'   => 'required',
//             'start_date' => 'required',
//             'end_date'   => 'required'
//         ]);

//         if ($validator->fails()) {
//         	\Session::flash('warnning','Please enter the valid details');
//             return Redirect::to('/events')->withInput()->withErrors($validator);
//         }

//         $event = new Event;
//         $event->contacto   = $request['contacto'];
//         $event->telefono   = $request['telefono'];
//         $event->start_date = $request['start_date'];
//         $event->end_date   = $request['end_date'];
//         $event->save();

//         \Session::flash('success','Event added successfully.');
//         return Redirect::to('/events.index');
//     }


// }
