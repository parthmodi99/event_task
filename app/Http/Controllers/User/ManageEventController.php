<?php

namespace App\Http\Controllers\User;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ManageEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = array();
        $db_events = Event::all();
        foreach($db_events as $db_event) {
            $events[] = [
                'id'   => $db_event->id,
                'title' => $db_event->person_name,
                'start' => $db_event->start_date,
                'end' => $db_event->end_date,
                'color' => '#924ACE'
            ];
        }
        return view('user.pages.calendar.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $event = Event::create([
            'person_name' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json([
            'id' => $event->id,
            'start' => $event->start_date,
            'end' => $event->end_date,
            'title' => $event->person_name,
            'color' =>'#924ACE',

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::find($id);
        if(! $event) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }

        $event->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json('Event updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);

        if(! $event) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }

        $event->delete();

        return $id;
    }
}
