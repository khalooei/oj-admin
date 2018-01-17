<?php

namespace App\Http\Controllers\Backend\Contest;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Controllers\Controller;
use App\Models\Contest;

class ContestTableController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $contests;

    /**
     * @param UserRepository $contests
     */
    public function __construct(Contest $contests)
    {
        $this->contests = $contests;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        $contest = Contest::with('user')->select(['id', 'title','slug','description','enabled','is_timer_on','active_at','start_at','freeze_at','unfreeze_at','end_at','user_id','created_at','updated_at']);

        return Datatables::of($contest)
            ->editColumn('enabled', function ($contest) {
                if ($contest->enabled == true){
                    return '<span class="label label-success">enabled</span>';
                }
                return '<span class="label label-danger">disabled</span>';
            })
            ->editColumn('is_timer_on', function ($contest) {
                if ($contest->is_timer_on == true){
                    return '<span class="label label-success">active</span>';
                }
                return '<span class="label label-danger">deactive</span>';
            })
            ->editColumn('user_id', function ($contest) {
                return $contest->user->first_name .' '. $contest->user->last_name;
            })
            ->addColumn('actions', function ($contest) {
                $is_enable_str = $is_enable_icon= '';
                $contest->enabled ? $is_enable_str = 'Disable' : $is_enable_str = 'Enable';
                $contest->enabled ? $is_enable_icon = 'pause' : $is_enable_icon = 'play';
                return '
                <a href="'.route('admin.contest.show', $contest->id).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="View"></i></a> 
                <a href="'.route('admin.contest.edit', $contest->id).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a> 
                <form action="'.route('admin.contest.enabled', $contest->id).'" method="POST" name="enabled_item" style="display:inline;">
                    ' . csrf_field() . '
                    <button class="btn btn-xs btn-warning"><i class="fa fa-'.$is_enable_icon.'" data-toggle="tooltip" data-placement="top" title="'.$is_enable_str.' Contest"></i>
                    </button> 
                </form>
                <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
					<form action="'.route('admin.contest.destroy', $contest->id).'" method="POST" name="delete_item" style="display:none">
					' . method_field('DELETE') . '
                    ' . csrf_field() . '
					</form>
				</a>';
            })
            ->rawColumns(['actions', 'enabled', 'is_timer_on'])
            ->make(true);
    }
}
