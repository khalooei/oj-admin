<?php

namespace App\Http\Controllers\Backend\Contest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Contest\ManageContestRequest;
use App\Http\Requests\Backend\Contest\StoreContestRequest;
use App\Http\Requests\Backend\Contest\UpdateContestRequest;

use App\Events\Backend\Contest\ContestCreated;
use App\Events\Backend\Contest\ContestUpdated;
use App\Events\Backend\Contest\ContestDeleted;
use App\Events\Backend\Contest\ContestEnabled;

use App\Models\Contest;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageContestRequest $request)
    {
        return view('backend.contents.contest.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ManageContestRequest $request)
    {
        return view('backend.contents.contest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContestRequest $request)
    {
        $data = $request->except('_token');

        $newContest = Contest::create($data);
        event(new ContestCreated($newContest));
        
        return redirect()->route('admin.contest.index')->withFlashSuccess(trans('alerts.backend.contest.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contest $contest, ManageContestRequest $request)
    {
        return view('backend.contents.contest.show')
            ->withContest($contest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contest $contest, ManageContestRequest $request)
    {
        return view('backend.contents.contest.edit')
            ->withContest($contest);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Contest $contest, UpdateContestRequest $request)
    {
        if (empty($request->is_timer_on)){
            $request->request->add(['is_timer_on' => false]);
        }
        if (empty($request->enabled)){
            $request->request->add(['enabled' => false]);
        }

        $data = $request->except('_token');
        // dd($data);

        $newContest = Contest::find($contest->id);
        $newContest->update($data);
        event(new ContestUpdated($newContest));

        return redirect()->route('admin.contest.index')->withFlashSuccess(trans('alerts.backend.contest.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contest $contest, ManageContestRequest $request)
    {
        // Validation delete //
        // Don't delete associated contest with problems 
        // if ($contest->problems->count > 0) { return error gitu } throw new GeneralException(trans('exceptions.backend.access.contests.has_users'));
        // Detach all associated contest $contest->problems()->sync([]);
        // $contest->problems()->sync([]);

        // Delete, then event on deleted
        $contest->delete();
        event(new ContestDeleted($contest));

        return redirect()->route('admin.contest.index')->withFlashSuccess(trans('alerts.backend.contest.deleted'));
    }

    /**
     * Disable or Enablecontest
     * @param Conetst $contes
     * @return \Illumoinate\Http\Response
     */
    public function enabled(Contest $contest){

        $newContest = Contest::find($contest->id);
        $newContest->update(['enabled' => $contest->enabled ? false : true]);

        event(new ContestEnabled($newContest));

        return redirect()->route('admin.contest.index')->withFlashSuccess($contest->enabled ? trans('alerts.backend.contest.disabled') : trans('alerts.backend.contest.enabled'));
    }
}
