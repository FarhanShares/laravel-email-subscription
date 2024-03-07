<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Site;
use App\Events\PostCreated;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    /**
     * Store a newly created post for a specific site.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $identifier
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request, $identifier)
    {
        // Ensure the site exists
        $site = Site::find($identifier);
        if (!$site) {
            return response()->json(['message' => 'Site not found'], 404);
        }

        // Create and save the new post
        $post = new Post();
        $post->site_id = $identifier;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        // Dispatch the event: the command scheduler is handling it
        // If we wish to dispatch here, notified_at field should be updated
        // PostCreated::dispatch($post);

        return response()->json($post, 201);
    }


    /**
     * Not implemented the following methods as it's a demo task or not asked for these explicitly
     */


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
