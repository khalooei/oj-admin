<?php

namespace App\Http\Controllers\Backend\Problem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Problem;


class ProblemTableController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $problems;

    /**
     * @param UserRepository $problems
     */
    public function __construct(Problem $problems)
    {
        $this->problems = $problems;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function __invoke()
    {
        $problem = Problem::with('user')->select(['id', 'title','slug', 'user_id','created_at','updated_at']);

        return Datatables::of($problem)
            ->editColumn('user_id', function ($problem) {
                return $problem->user->first_name .' '. $problem->user->last_name;
            })
            ->addColumn('actions', function ($problem) {
                return '
                <a href="'.route('admin.problem.show', $problem->id).'" class="btn btn-xs btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="View"></i></a> 
                <a href="'.route('admin.problem.edit', $problem->id).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a> 
                <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                    <form action="'.route('admin.problem.destroy', $problem->id).'" method="POST" name="delete_item" style="display:none">
                    ' . method_field('DELETE') . '
                    ' . csrf_field() . '
                    </form>
                </a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
