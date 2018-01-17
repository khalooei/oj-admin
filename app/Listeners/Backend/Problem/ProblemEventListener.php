<?php

namespace App\Listeners\Backend\Problem;

use App\Events\BackendProblemProblemDeleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProblemEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Problem';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->problem->id)
            ->withText('created problem <strong>'.$event->problem->title.'</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->problem->id)
            ->withText('trans("history.backend.problems.updated") <strong>'.$event->problem->title.'</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->log();
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->problem->id)
            ->withText('trans("history.backend.problems.deleted") <strong>'.$event->problem->title.'</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->log();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Problem\ProblemCreated::class,
            'App\Listeners\Backend\Problem\ProblemEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Problem\ProblemUpdated::class,
            'App\Listeners\Backend\Problem\ProblemEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Problem\ProblemDeleted::class,
            'App\Listeners\Backend\Problem\ProblemEventListener@onDeleted'
        );
    }
}
