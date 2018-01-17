<?php

Breadcrumbs::register('admin.contest.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.content.contests.management'), route('admin.contest.index'));
});

Breadcrumbs::register('admin.contest.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.contest.index');
    $breadcrumbs->push(trans('menus.backend.content.contests.view'), route('admin.contest.show', $id));
});

Breadcrumbs::register('admin.contest.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.contest.index');
    $breadcrumbs->push(trans('menus.backend.content.contests.create'), route('admin.contest.create'));
});

Breadcrumbs::register('admin.contest.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.contest.index');
    $breadcrumbs->push(trans('menus.backend.content.contests.edit'), route('admin.contest.edit', $id));
});
