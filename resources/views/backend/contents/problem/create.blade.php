@extends ('backend.layouts.app')

@section ('title', 'Problem Management' . ' | ' . 'Create Problem')

@section('page-header')
    <h1>
        {{ 'Problem Management' }}
        <small>{{ 'Create Problem' }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.problem.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'files' => true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ 'Create Problem' }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.contents.includes.partials.problem-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('contest_id', 'Contest', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('contest_id', $contests , null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Contest']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('problem_code', 'Problem Code', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('problem_code', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Problem Code']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('title', 'Title', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('title', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Title']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('sub_title', 'Sub Title', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('sub_title', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Sub Title']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('content', 'Content', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('content', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Content']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('sample_input', 'Sample Input', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('sample_input', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Sample Input']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('sample_output', 'Sample Output', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('sample_output', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Sample Output']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('source_code', 'Source Code', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::file('source_code', ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Source Code']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('is_allow_submit', 'Is Allow Submit', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-2">
                        {{ Form::radio('is_allow_submit', 'allowed') }} Yes
                        <br>
                        {{ Form::radio('is_allow_submit', 'not-allowed', true) }} No
                    </div><!--col-lg-2-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('is_allow_judge', 'Is Allow Judge', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-2">
                        {{ Form::radio('is_allow_judge', 'allowed') }} Yes
                        <br>
                        {{ Form::radio('is_allow_judge', 'not-allowed', true) }} No
                    </div><!--col-lg-2-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('label_color', 'Color', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <input type="color" name="label_color" value="#ff0000" class="form-control" placeholder="color">
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('level', 'Level', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('level', ['easy' => 'Easy', 'medium' => 'Medium', 'hard' => 'Hard'], null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Level']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('time_limit', 'Time Limit', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::number('time_limit', 'value', ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Time Limit']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('memory_limit', 'Memory Limit', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::number('memory_limit', 'value', ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Memory Limit']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.problem.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    {{ Html::script('js/backend/problem/script.js') }}
@endsection
