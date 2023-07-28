<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profile_list()
    {

        dd("event_list");
        // $data = DoctorProfile::with(['speciality','department'])->latest()->get();

        // return DataTables::of($data)
        //     ->addIndexColumn()
        //     ->addColumn('photo', function (DoctorProfile $data) {
        //         if ($data->profile_photo !='') {
        //             $url= asset('../storage/app/public/uploads/doctor_profile/'. $data->profile_photo);
        //         }
        //         return '<img src="'.$url.'" class="wi-50" align="center" />';
        //     })
        //     ->addColumn('full_name', function (DoctorProfile $data) {
        //         return $data->prefix.' '.$data->full_name;
        //     })
        //     ->addColumn('department', function (DoctorProfile $data) {
        //         return $data->department->department_name;
        //     })
        //     ->addColumn('status', function (DoctorProfile $data) {
        //         if ($data->active == 1) {
        //             $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
        //             data-offstyle="danger" value="' . $data->id . '" checked>';
        //         } else {
        //             $status_link = '<input class="tgl status_btn" type="checkbox" data-toggle="toggle" data-width="100" id="is_show" name="is_show" data-on="Show" data-off="Hide" data-onstyle="success"
        //             data-offstyle="danger" value="' . $data->id . '">';
        //         }
        //         return $status_link;
        //     })
        //     ->addColumn('actions', function (DoctorProfile $data) {
        //         if ($data->isActivate()) {
        //             $button = 'success';
        //             $text = 'Deactivate';
        //             $title = 'You want to deactivate this doctor?';
        //             $icon = '<i class="fa fa-unlock"></i>';
        //         } else {
        //             $button = 'danger';
        //             $text = 'Activate';
        //             $title = 'You want to activate this doctor?';
        //             $icon = '<i class="fa fa-lock"></i>';
        //         }

        //         $edit_link = '<a title="View Details" href="' . route('admin.doctor.edit', [$data->id]) . '" class="btn btn-primary btn-icon-text" style="padding: 0.375rem 0.75rem;font-size: 1rem;">' .
        //         '<i class="fa fa-pencil"></i>' .
        //         '</a>';

        //         $delete_link = '<a title="Delete Doctor" href="' . route('admin.doctor.destroy', [$data->id]) . '" class="delete-link btn btn-danger btn-icon-text" style="padding: 0.375rem 0.75rem;font-size: 1rem;">' .
        //         '<i class="fa fa-trash"></i>' .
        //         '</a>';

        //         return $edit_link . ' ' . $delete_link;
        //     })
        //     ->rawColumns(['actions','photo', 'status'])
        //     ->make(true);
    }
}
