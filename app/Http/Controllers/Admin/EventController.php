<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        View::share('categories', Category::where('status', 1)->orderby('category')->get());
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.event.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'person_name' => 'required',
            'start_date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $event = $request->all();

        $event['start_date']= date('Y-m-d H:i:s', strtotime($request->start_date));
        $event['end_date']= date('Y-m-d H:i:s', strtotime($request->end_date));
        $success = Event::create($event);

        if ($success) {
            return response()->json(['success' => true, 'message' => 'Event Added sucessfully.'], 200);
        }
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
        $event_details = Event::find($id);

        return view('admin.pages.event.edit', compact('event_details'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'person_name' => 'required',
            'start_date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'code' => 202, 'message' => implode("<br>", $validator->errors()->all())], 202);
        }

        $find_event = Event::find($id);

        $update_event = $request->all();
        $update_event['start_date']= date('Y-m-d H:i:s', strtotime($request->start_date));
        $update_event['end_date']= date('Y-m-d H:i:s', strtotime($request->end_date));
        $success = Event::find($id)->update($update_event);

        if ($success) {
            return response()->json(['success' => true, 'message' => 'Event Added sucessfully.'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event_delete = Event::find($id)->delete();

         if ($event_delete) {
             return response()->json(['success' => true, 'message' => 'Event has been deleted.', 'data' => []], 200);
         } else {
             return response()->json(['success' => false, 'message' => 'Something went wrong.', 'data' => []], 200);
         }
    }

    public function event_list()
    {
        $data = Event::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('event_date', function (Event $data) {

                if($data->start_date != ''){
                    $date = date('d/m/Y', strtotime($data->start_date));
                }
                return $date;
            })
            ->addColumn('status', function (Event $data) {
                if ($data->active == 1) {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $data->id . '" checked>';
                } else {
                    $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
                    data-offstyle="danger" value="' . $data->id . '">';
                }
                return $status_link;
            })
            ->addColumn('actions', function (Event $data) {
                if ($data->isActivate()) {
                    $button = 'success';
                    $text = 'Deactivate';
                    $title = 'You want to deactivate this doctor?';
                    $icon = '<i class="fa fa-unlock"></i>';
                } else {
                    $button = 'danger';
                    $text = 'Activate';
                    $title = 'You want to activate this doctor?';
                    $icon = '<i class="fa fa-lock"></i>';
                }

                $edit_link = '<a title="View Details" href="' . route('admin.event.edit', [$data->id]) . '" class="btn btn-primary btn-icon-text" style="padding: 0.375rem 0.75rem;font-size: 1rem;">' .
                'Edit' .
                '</a>';

                $delete_link = '<a title="Delete Doctor" href="' . route('admin.event.destroy', [$data->id]) . '" class="delete-link btn btn-danger btn-icon-text" style="padding: 0.375rem 0.75rem;font-size: 1rem;">' .
                'Delete' .
                '</a>';

                return $edit_link . ' ' . $delete_link;
            })
            ->rawColumns(['actions', 'status', 'event_date'])
            ->make(true);
    }

    public function activateToggle($id)
    {
        $event = Event::findOrFail($id);

        $event->active = !$event->active;
        $event->save();

        return response()->json(['success' => true, 'message' => 'Event activate status changed.', 'data' => []], 200);
    }
}
