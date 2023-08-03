<?php

namespace App\Http\Controllers\User;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        return view('user.pages.home');
    }

    public function calendar(Request $request)
    {
    //     if($request->ajax()) {
    //         // dd("in");
    //         $data = Event::whereDate('event_date', '>=', $request->start)
    //                   ->whereDate('end',   '<=', $request->end)
    //                   ->get(['id', 'person_name', 'event_date', 'end']);

    //         return response()->json($data);
    //    }

        $all_events = Event::get();
        $list = [];

        foreach ($all_events as $all_event) {
            $abc['id'] = $all_event['id'];
            $abc['title'] = $all_event['person_name'];
            $abc['start'] = $all_event['event_date'];
            $abc['end'] = $all_event['end'];
            $list[] = $abc;
        }

        // dd($list);

        return view('user.pages.calendar', compact('list'));
    }

    // public function manage_event(Request $request)
    // {

    //     switch ($request->type) {
    //        case 'add':
    //           $event = Event::create([
    //               'person_name' => $request->title,
    //               'event_date' => $request->start,
    //               'end' => $request->end,
    //           ]);

    //           return response()->json($event);
    //          break;

    //        case 'update':
    //           $event = Event::find($request->id)->update([
    //               'person_name' => $request->title,
    //               'event_date' => $request->start,
    //               'end' => $request->end,
    //           ]);

    //           return response()->json($event);
    //          break;

    //        case 'delete':
    //         // dd($request->id);
    //           $event = Event::find($request->id)->delete();
    //           return response()->json($event);
    //          break;

    //        default:
    //          # code...
    //          break;
    //     }
    // }
}
