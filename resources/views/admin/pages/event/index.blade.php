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
                            <h2>Event</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <!-- Zero Configuration  Starts-->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive big tableinsidetable">
                                <table class="display event_table" id="event_table">
                                    <a class="btn btn-success mb-3" type="button" href="{{ route('admin.event.create') }}">
                                        Add New Event
                                    </a>

                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Person name</th>
                                            <th>Event Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Zero Configuration  Ends-->
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin_assets/custom/event.js') }}"></script>
@endsection
