<table class="table table-striped table-hover">
    <tr>
        <th>Title</th>
        <td>{{ $contest->title }}</td>
    </tr>

    <tr>
        <th>Link</th>
        <td><a href="#" target="_blank">Open link (slug: {{ $contest->slug }})</a></td>
    </tr>

    <tr>
        <th>Enable Contest</th>
        <td>
            @if ($contest->enabled == true)
                <span class="label label-success">enabled</span>
            @else
                <span class="label label-danger">disabled</span>
            @endif
        </td>
    </tr>

    <tr>
        <th>Timer Status</th>
        <td>
            @if ($contest->is_timer_on == true)
                <span class="label label-success">active</span>
            @else
                <span class="label label-danger">deactive</span>
            @endif
        </td>
    </tr>

    <tr>
        <th>Active TIme</th>
        <td>{{ $contest->active_at }}</td>
    </tr>

    <tr>
        <th>Start TIme</th>
        <td>{{ $contest->start_at }}</td>
    </tr>

    <tr>
        <th>Freeze TIme</th>
        <td>{{ $contest->freeze_at }}</td>
    </tr>

    <tr>
        <th>Unfreeze TIme</th>
        <td>{{ $contest->unfreeze_at }}</td>
    </tr>

    <tr>
        <th>End TIme</th>
        <td>{{ $contest->end_at }}</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.contents.contests.tabs.content.overview.created_at') }}</th>
        <td>{{ $contest->created_at }} ({{ $contest->created_at->diffForHumans() }})</td>
    </tr>

    <tr>
        <th>{{ trans('labels.backend.contents.contests.tabs.content.overview.last_updated') }}</th>
        <td>{{ $contest->updated_at }} ({{ $contest->updated_at->diffForHumans() }})</td>
    </tr>

    @if ($contest->trashed())
        <tr>
            <th>{{ trans('labels.backend.contents.contests.tabs.content.overview.deleted_at') }}</th>
            <td>{{ $contest->deleted_at }} ({{ $contest->deleted_at->diffForHumans() }})</td>
        </tr>
    @endif
</table>