<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SubscriptionController;

/**
 * None of the routes are neither protected nor requires authorization.
 * Authentication or Authorization wasn't a requirement, skipped it entirely.
 */

// To list all sites
Route::get('/sites', [SiteController::class, 'index'])
    ->name('sites.index');

// To show details about a site
Route::get('/sites/{identifier}', [SiteController::class, 'show'])
    ->name('sites.show');

// To create a post for a specific site
Route::post('/sites/{identifier}/posts', [PostController::class, 'store'])
    ->name('sites.posts.create');

// To subscribe to a specific site
Route::post('/sites/{identifier}/subscribe', [SubscriptionController::class, 'store'])
    ->name('sites.subscription.create');
