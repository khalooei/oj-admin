@extends ('backend.layouts.app')

@section ('title', 'Contest Management' . ' | ' . 'Create Contest')

@section('page-header')
    <h1>
        {{ 'Contest Management' }}
        <small>{{ 'Create Contest' }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.contest.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ 'Create Contest' }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.contents.includes.partials.contest-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('title', 'Title', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('title', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Title']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('description', 'Description', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Description']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('active_at', 'Active Time', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('active_at', null, ['class' => 'form-control form_datetime', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Active Time', 'readonly']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('start_at', 'Start Time', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('start_at', null, ['class' => 'form-control form_datetime', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Start Time', 'readonly']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('freeze_at', 'Freeze Time', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('freeze_at', null, ['class' => 'form-control form_datetime', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Freeze Time', 'readonly']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('unfreeze_at', 'Unfreeze Time', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('unfreeze_at', null, ['class' => 'form-control form_datetime', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Unfreeze Time', 'readonly']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('end_at', 'End Time', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('end_at', null, ['class' => 'form-control form_datetime', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'End Time', 'readonly']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('enabled', 'Enable Contest', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-2">
                        {{ Form::checkbox('enabled', '1', false) }}
                    </div><!--col-lg-2-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('is_timer_on', 'Timer Status (If active timer is actived, contest will up without timer)', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-2">
                        {{ Form::checkbox('is_timer_on', '1', false) }}
                    </div><!--col-lg-2-->
                </div><!--form control-->

            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.contest.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection

@section('before-styles')
    {{ Html::style('css/backend/plugin/datetimepicker/bootstrap-datetimepicker.css') }}
@endsection
@section('after-scripts')
    {{ Html::script('js/backend/plugin/datetimepicker/bootstrap-datetimepicker.min.js?t=20130302') }}
    {{ Html::script('js/backend/contest/script.js') }}
@endsection
