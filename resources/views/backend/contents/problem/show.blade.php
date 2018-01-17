@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.contents.contests.management') . ' | ' . trans('labels.backend.contents.contests.view'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.contents.contests.management') }}
        <small>{{ trans('labels.backend.contents.contests.view') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.contents.contests.view') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.contents.includes.partials.contest-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div role="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">{{ trans('labels.backend.contents.contests.tabs.titles.overview') }}</a>
                    </li>

                    <li role="presentation">
                        <a href="#problem" aria-controls="problem" role="tab" data-toggle="tab">{{ trans('labels.backend.contents.contests.tabs.titles.problem') }}</a>
                    </li>

                    <li role="presentation">
                        <a href="#history" aria-controls="history" role="tab" data-toggle="tab">{{ trans('labels.backend.contents.contests.tabs.titles.history') }}</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane mt-30 active" id="overview">
                        @include('backend.contents.contest.show.overview')
                    </div><!--tab overview profile-->

                    <div role="tabpanel" class="tab-pane mt-30" id="problem">
                        <h3>Associated Problems</h3>
                        {{-- @include('backend.contents.show.tabs.problem') --}}
                    </div><!--tab panel problem-->

                    <div role="tabpanel" class="tab-pane mt-30" id="history">
                        @include('backend.contents.contest.show.history')
                    </div><!--tab panel history-->

                </div><!--tab content-->

            </div><!--tab panel-->

        </div><!-- /.box-body -->
    </div><!--box-->
@endsection