<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = request('page', 1);
        $perPage = request('perPage', 15);

        $sites = Cache::remember("sites.page.{$page}.perPage.{$perPage}", 60, function () use ($perPage) {
            return Site::query()->paginate($perPage);
        });

        return response()->json($sites);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $site = Cache::remember("sites.{$id}", 60 * 60, function () use ($id) {
            return Site::find($id);
        });

        if (!$site) {
            return response()->json(['message' => 'Site not found.'], 404);
        }

        return response()->json($site);
        $site = Cache::remember("sites.{$id}", 60 * 60, function () use ($id) {
            return Site::find($id);
        });

        if (!$site) {
            return response()->json(['message' => 'Site not found.'], 404);
        }

        return response()->json($site);
    }

    /**
     * Not implemented the following methods as it's a demo task or not asked for these explicitly
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
