<?php

namespace App\Listeners\Backend\Contest;

use App\Events\BackendContestContestCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContestEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Contest';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->contest->id)
            ->withText('created contest <strong>'.$event->contest->title.'</strong>')
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
            ->withEntity($event->contest->id)
            ->withText('trans("history.backend.contests.updated") <strong>'.$event->contest->title.'</strong>')
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
            ->withEntity($event->contest->id)
            ->withText('trans("history.backend.contests.deleted") <strong>'.$event->contest->title.'</strong>')
            ->withIcon('trash')
            ->withClass('bg-red')
            ->log();
    }

    /**
     * @param $event
     */
    public function onEnabled($event)
    {
        if ($event->contest->enabled) 
            history()->withType($this->history_slug)
                ->withEntity($event->contest->id)
                ->withText('trans("history.backend.contests.enabled") <strong>'.$event->contest->title.'</strong>')
                ->withIcon('play')
                ->withClass('bg-blue')
                ->log();
                
        else 
            history()->withType($this->history_slug)
                ->withEntity($event->contest->id)
                ->withText('trans("history.backend.contests.disabled") <strong>'.$event->contest->title.'</strong>')
                ->withIcon('pause')
                ->withClass('bg-yellow')
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
            \App\Events\Backend\Contest\ContestCreated::class,
            'App\Listeners\Backend\Contest\ContestEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Contest\ContestUpdated::class,
            'App\Listeners\Backend\Contest\ContestEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Contest\ContestDeleted::class,
            'App\Listeners\Backend\Contest\ContestEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Contest\ContestEnabled::class,
            'App\Listeners\Backend\Contest\ContestEventListener@onEnabled'
        );
    }
}
