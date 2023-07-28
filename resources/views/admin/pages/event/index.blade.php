@extends('admin.layouts.login_after')

@section('style')
@endsection

@section('content')
<div style="margin-left: 230px;">
    {{-- <h2>Event</h2> --}}

     
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
                                            <th>Event Name</th>
                                            <th>User name</th>
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
