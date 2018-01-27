<?php

namespace App\Http\Controllers\Backend\Problem;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Problem\ManageProblemRequest;
use App\Http\Requests\Backend\Problem\StoreProblemRequest;
use App\Http\Requests\Backend\Problem\UpdateProblemRequest;

use App\Events\Backend\Problem\ProblemCreated;
use App\Events\Backend\Problem\ProblemUpdated;
use App\Events\Backend\Problem\ProblemDeleted;
use App\Models\Problem;
use App\Models\Contest;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageProblemRequest $request)
    {
        return view('backend.contents.problem.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ManageProblemRequest $request)
    {
        $getContests = Contest::all();
        // translate to select option format
        $contests = [];
        foreach ($getContests as $contest) {
            $contests[$contest->id] = $contest->title;
        }

        return view('backend.contents.problem.create', ['contests' => $contests]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProblemRequest $request)
    {
        $data = $request->except('_token');

        $newProblem = Problem::create($data);
        event(new ProblemCreated($newProblem));
        
        return redirect()->route('admin.problem.index')->withFlashSuccess(trans('alerts.backend.problem.created'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Problem $problem, ManageProblemRequest $request)
    {
        $getContests = Contest::all();
        // translate to select option format
        $contests = [];
        foreach ($getContests as $contest) {
            $contests[$contest->id] = $contest->title;
        }

        return view('backend.contents.problem.edit', ['contests' => $contests])
            ->withProblem($problem);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Problem $problem, UpdateProblemRequest $request)
    {
        // dd($request->all());
        $data = $request->except('_token');
        dd($data);

        // $newProblem = Problem::create($data);
        // event(new ProblemCreated($newProblem));
        
        return redirect()->route('admin.problem.index')->withFlashSuccess(trans('alerts.backend.problem.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Problem $problem, ManageProblemRequest $request)
    {
        $problem->delete();
        event(new ProblemDeleted($problem));

        return redirect()->route('admin.problem.index')->withFlashSuccess(trans('alerts.backend.problem.deleted'));
    }
}
