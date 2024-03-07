<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Http\Requests\StoreSubscriptionRequest;

class SubscriptionController extends Controller
{
    /**
     * Store a new subscription in the database.
     *
     * @param  StoreSubscriptionRequest $request
     * @param  int  $identifier The ID of the website to subscribe to.
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriptionRequest $request, $identifier)
    {
        // Check if the site exists
        $site = Site::find($identifier);
        if (!$site) {
            return response()->json(['message' => 'Website not found.'], 404);
        }

        // Create the subscription
        $subscriber = new Subscriber();
        $subscriber->site_id = $identifier;
        $subscriber->email = $request->email;
        $subscriber->save();

        return response()->json(['message' => 'Subscription successful.'], 201);
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
