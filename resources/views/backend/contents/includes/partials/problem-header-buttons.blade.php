<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.problem.index', 'All Problems', [], ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('admin.problem.create', 'Create Problem', [], ['class' => 'btn btn-success btn-xs']) }}
    {{-- {{ link_to_route('admin.problem.deactivated', 'Disabled Problems', [], ['class' => 'btn btn-warning btn-xs']) }} --}}
    {{-- {{ link_to_route('admin.problem.deleted', 'Deleted Problems', [], ['class' => 'btn btn-danger btn-xs']) }} --}}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Problems <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.problem.index', 'All Problems') }}</li>
            <li>{{ link_to_route('admin.problem.create', 'Create Problem') }}</li>
            <li class="divider"></li>
            {{-- <li>{{ link_to_route('admin.problem.deactivated', 'Disabled Problems') }}</li> --}}
            {{-- <li>{{ link_to_route('admin.problem.deleted', 'Deleted Problems') }}</li> --}}
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>