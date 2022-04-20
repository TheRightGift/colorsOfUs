<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracking = Tracking::where('deleted_at', null)->paginate();
        return response()->json(['message' => 'Trackings retrieved successfully', 'trackings' => $tracking]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'state_id' => ['required','integer'],
            'city_id' => ['required','integer'],
            'tracking_id' => ['required', 'string'],
        ]);
        // TODO: Generate tracking_id based on State/lga the item is going to
        $tracking = Tracking::create([
            'state_id' => $request->get('state_id'),
            'city_id' => $request->get('city_id'),
            'tracking_id' => $request->get('tracking_id'),
            'created_at' => now(),
        ]);

        return response()->json(['success' => 'New tracking added.', 'tracking' => array($tracking)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tracking = Tracking::where('id', $id)->first();
        return response()->json(['tracking' => $tracking, 'message' => 'Tracking retrieved successfuly'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'state_id' => ['required','integer'],
            'city_id' => ['required','integer'],
            'tracking_id' => ['required','integer'],
        ]);

        $tracking = Tracking::where('id', $id)->update($request->only(['state_id', 'city_id', 'tracking_id', 'updated_at' => now()]));
        return response()->json(['message' => 'Tracking updated successfully', 'tracking' => $tracking]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tracking::where('id', $id)->delete();
        return response()->json(['message' => 'Archived successfuly'], 204);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tracking  $id
     * @return \Illuminate\Http\Response
     */
    public function refresh($id)
    {
        Tracking::where('id', $id)->restore();
        return response()->json(['message' => 'Unarchived successfuly'], 201);
    }
}
