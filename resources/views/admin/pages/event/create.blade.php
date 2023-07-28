@extends('admin.layouts.login_after')

@section('style')
@endsection

@section('content')
    <div style="margin-left: 230px;">
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title" style="margin-top: 18px;">
                    <div class="row">
                        <div class="col-6">
                            <h3>Add Event</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid doctors_profile">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.event.store') }}" method="POST" id="add_doctor_profile_form"
                            name="add_doctor_profile_form" class="form-inline" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-1 pe-2">
                                <div class="mb-3">
                                    <label for="full_name" class="form-label">Full Name</label>
                                    <select name="prefix" class="form-select">
                                        <option value="Dr." selected>Dr.</option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Ms.">Ms.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-11 pe-2">
                                <div class="mb-3">
                                    <label for="full_name" class="form-label"></label>
                                    <input type="text" class="form-control" id="full_name" name="full_name"
                                        placeholder="Full name" style="margin-top: 6px;" />
                                </div>
                            </div>
                            <div class="col-lg-1">
                            </div>
                            <div class="col-lg-11">
                                <label id="full_name-error" class="error" for="full_name" style="display: none"></label>
                            </div>

                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="qualification" class="form-label">Qualification</label>
                                    <input type="text" class="form-control" id="qualification" name="qualification"
                                        placeholder="MB, MBBS, ECFMG-USA" />
                                </div>
                            </div>

                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="speciality_id" class="form-label">Speciality</label>
                                    <select id="speciality_id" class="js-states form-control form-select chosen-select"
                                        name="speciality_id[]" multiple required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label id="qualification-error" class="error" for="qualification"
                                    style="display: none"></label>
                            </div>
                            <div class="col-lg-6">
                                <label id="speciality_id-error" class="error" for="speciality_id"
                                    style="display: none"></label>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="cluster_id" class="form-label">Cluster</label>
                                    <select class="form-select custom_select" name="cluster_id" id="cluster_id">
                                        <option value="" selected disabled>Select Cluster</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="language_known" class="form-label">Language Known</label>
                                    <input type="text" class="form-control" id="language_known" name="language_known"
                                        placeholder="English, Hindi, Gujarati" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                            </div>
                            <div class="col-lg-6">
                                <label id="language_known-error" class="error" for="language_known"
                                    style="display: none"></label>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="department_id" class="form-label">Department</label>
                                    <select class="form-select custom_select" name="department_id" id="department_id"
                                        required>
                                        <option value="" selected disabled>Select Department</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label id="department_id-error" class="error" for="department_id"
                                    style="display: none"></label>
                            </div>
                            <div class="col-lg-6">
                                <label id="designation-error" class="error" for="designation"
                                    style="display: none"></label>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="mobile_no" class="form-label">Mobile No</label>
                                    <input type="number" class="form-control" id="mobile_no" name="mobile_no"
                                        placeholder="9945XXXXXX" />
                                </div>
                            </div>
                            <div class="col-lg-3 pe-2">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select custom_select" id="gender" name="gender"
                                        aria-label="Default select example">
                                        <option value="" selected disabled>Select gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 pe-2">
                                <div class="mb-3">
                                    <label for="opd_number" class="form-label">OPD Number</label>
                                    <input type="number" class="form-control" id="opd_number" name="opd_number" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label id="mobile_no-error" class="error" for="mobile_no"
                                    style="display: none"></label>
                            </div>
                            <div class="col-lg-3">
                                <label id="gender-error" class="error" for="gender" style="display: none"></label>
                            </div>
                            <div class="col-lg-3">
                            </div>

                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="opd_timing_morning" class="form-label">OPD Timing (Morning)</label>
                                    <input type="checkbox" id="opd_morning_yes" name="opd_morning_yes"
                                        style="margin-left: 10px;" value="0">
                                </div>
                            </div>
                            <div class="col-lg-6 pe-2">
                                <div class="mb-3">
                                    <label for="opd_timing_eveining" class="form-label">OPD Timing (Evening)</label>
                                    <input type="checkbox" id="opd_evening_yes" name="opd_evening_yes"
                                        style="margin-left: 10px;" value="0">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label id="opd_morning_yes-error" class="error" for="opd_morning_yes"
                                    style="display: none"><label>
                            </div>
                            <div class="col-lg-6">
                                <label id="opd_evening_yes-error" class="error" for="opd_evening_yes"
                                    style="display: none"><label>
                            </div>

                            <div class="row testing" style="display: contents;">
                                <div class="col-lg-3 pe-2 removable1">
                                    <div class="mb-3">
                                        <input type="time" class="form-control" id="opd_morning_from_time"
                                            name="opd_morning_from_time" value="" min="06:00" max="13:30"
                                            disabled />
                                    </div>
                                </div>
                                <div class="col-lg-3 pe-2 removable1">
                                    <div class="mb-3">
                                        <input type="time" class="form-control" id="opd_morning_to_time"
                                            name="opd_morning_to_time" value="" min="06:00" max="14:00"
                                            disabled />
                                    </div>
                                </div>
                            </div>

                            <div class="row testing2" style="display: contents;">
                                <div class="col-lg-3 pe-2 removable2">
                                    <div class="mb-3">
                                        <input type="time" class="form-control" id="opd_evening_from_time"
                                            name="opd_evening_from_time" value="" min="14:00" max="22:30"
                                            disabled />
                                    </div>
                                </div>
                                <div class="col-lg-3 pe-2 removable2">
                                    <div class="mb-3">
                                        <input type="time" class="form-control" id="opd_evening_to_time"
                                            name="opd_evening_to_time" value="" min="14:00" max="23:00"
                                            disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label id="opd_morning_from_time-error" class="error" for="opd_morning_from_time"
                                    style="display: none"></label>
                            </div>
                            <div class="col-lg-3">
                                <label id="opd_morning_to_time-error" class="error" for="opd_morning_to_time"
                                    style="display: none"></label>
                            </div>
                            <div class="col-lg-3">
                                <label id="opd_evening_from_time-error" class="error" for="opd_evening_from_time"
                                    style="display: none"></label>
                            </div>
                            <div class="col-lg-3">
                                <label id="opd_evening_to_time-error" class="error" for="opd_evening_to_time"
                                    style="display: none"></label>
                            </div>

                            <div class="col-lg-12 pe-2">
                                <div class="col-lg-6 pe-2">
                                    <label for="Profile_photo" class="form-label">Profile Photo</label>
                                </div>
                            </div>


                            <div class="image_preview_container mb-3">
                                <img id="image_preview" />
                            </div>

                            <div class="col-lg-12 pe-2">
                                <div class="mb-3">
                                    <input type="file" accept="image/*" class="form-control image" id="upload_image"
                                        name="upload_image" />
                                    <input type="text" class="form-control" id="upload_image_url"
                                        name="upload_image_url" hidden>
                                </div>
                            </div>

                            <input type="hidden" name="profile_photo" id="profile_photo" value="" />

                            <div class="col-lg-12 pe-2">
                                <div class="mb-3">
                                    <label for="experience" class="form-label">Experience</label>
                                    <textarea class="form-control" placeholder="Experience" id="experience" name="experience" style="height: 100px"></textarea>
                                    <label id="experience-error" class="error" for="experience"></label>
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="experience" class="form-label">Professional Highlights</label>
                                    <textarea class="form-control" placeholder="Professional Highlights" id="professional_highlight"
                                        name="professional_highlight" style="height: 100px"></textarea>
                                    <label id="professional_highlight-error" class="error"
                                        for="professional_highlight"><label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <a class="btn btn-secondary modelbtn" type="button"
                                        href="{{ route('admin.event.index') }}">
                                        Close
                                    </a>
                                    <button class="btn btn-primary" type="submit" title=""> Add </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin_assets/custom/event.js') }}"></script>
@endsection
