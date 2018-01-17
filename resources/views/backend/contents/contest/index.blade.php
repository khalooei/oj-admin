@extends ('backend.layouts.app')

@section ('title', 'Contest Management')

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>
        Contest Management
        <small>Active Contests</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Active Contests</h3>

            <div class="box-tools pull-right">
                @include('backend.contents.includes.partials.contest-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="contests-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Enable Status</th>
                        <th>Timer Status</th>
                        <th>Active Time</th>
                        <th>Start Time</th>
                        <th>Freeze Time</th>
                        <th>Unfreeze Time</th>
                        <th>End Time</th>
                        <th>Created By</th>
                        <th>Created</th>
                        <th>Last Update</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->renderType('Contest') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

    <script>
        $(function () {
            $('#contests-table').DataTable({
                dom: 'lfrtip',
                processing: false,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route("admin.contest.get") }}',
                    type: 'post',
                    data: {status: 1, trashed: false},
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                    }
                },
                columns: [
                    {data: 'title', name: 'contests.title'},
                    {data: 'slug', name: 'contests.slug'},
                    {data: 'description', name: 'contests.description'},
                    {data: 'enabled', name: 'contests.enabled'},
                    {data: 'is_timer_on', name: 'contests.is_timer_on'},
                    {data: 'active_at', name: 'contests.active_at'},
                    {data: 'start_at', name: 'contests.start_at'},
                    {data: 'freeze_at', name: 'contests.freeze_at'},
                    {data: 'unfreeze_at', name: 'contests.unfreeze_at'},
                    {data: 'end_at', name: 'contests.end_at'},
                    {data: 'user_id', name: 'user.first_name', searchable: true, sortable: false},
                    {data: 'created_at', name: 'contests.created_at'},
                    {data: 'updated_at', name: 'contests.updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[11, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection
