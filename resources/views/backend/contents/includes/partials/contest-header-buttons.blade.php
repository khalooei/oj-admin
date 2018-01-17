<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.contest.index', 'All Contests', [], ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('admin.contest.create', 'Create Contest', [], ['class' => 'btn btn-success btn-xs']) }}
    {{-- {{ link_to_route('admin.contest.deactivated', 'Disabled Contests', [], ['class' => 'btn btn-warning btn-xs']) }} --}}
    {{-- {{ link_to_route('admin.contest.deleted', 'Deleted Contests', [], ['class' => 'btn btn-danger btn-xs']) }} --}}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Contests <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.contest.index', 'All Contests') }}</li>
            <li>{{ link_to_route('admin.contest.create', 'Create Contest') }}</li>
            <li class="divider"></li>
            {{-- <li>{{ link_to_route('admin.contest.deactivated', 'Disabled Contests') }}</li> --}}
            {{-- <li>{{ link_to_route('admin.contest.deleted', 'Deleted Contests') }}</li> --}}
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>