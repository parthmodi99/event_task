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
                        <form action="{{ route('admin.event.store') }}" method="POST" id="add_event_form"
                            name="add_event_form" class="form-inline" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 pe-2">
                                    <div class="mb-3">
                                        <label for="person_name" class="form-label">Person Name</label>
                                        <input type="text" class="form-control" id="person_name" name="person_name"
                                            placeholder="Person Name" />
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="category_id" class="form-label">Event Category</label>
                                    <select class="form-select custom_select" name="category_id" id="category_id">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="start_date"
                                        name="start_date"/>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="text" class="form-control" id="end_date"
                                        name="end_date" value="" readonly/>
                                </div>
                            </div>


                            <div class="col-lg-12 pe-2">
                                <div class="mb-3">
                                    <label for="detail" class="form-label">Details</label>
                                    <textarea class="form-control" placeholder="detail" id="detail" name="detail" style="height: 100px"></textarea>
                                    <label id="detail-error" class="error" for="detail"></label>
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
