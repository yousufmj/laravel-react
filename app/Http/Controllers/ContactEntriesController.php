<?php

namespace App\Http\Controllers;

use App\Entries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class ContactEntriesController extends Controller
{
    /**
     * Return all entries
     * @return array of objects with all entries
     */
    public function index()
    {
        return Entries::all();
    }

    /**
     * Create a new entry
     * @param object - the request object
     */
    public function create(Request $request)
    {
        // Create a simple validation for required fields
        $validate = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email",
            "message" => "required",
        ]);

        // return error messages
        if ($validate->fails()) {
            return response()->json($validate->messages(), 400);
        }

        $entries = Entries::create($request->all());

        return response()->json($entries, 201);
    }

    /**
     * Find a specific entry
     * @param object - request object containing entry id
     * @return object of entry details else 204
     */
    public function findOne(Request $request)
    {

        $getEntry = Entries::find($request->id);

        // Return no content if no entry is found
        if (!$getEntry) {
            return response()->json('', 204);
        }

        return $getEntry;
    }

    /**
     * Delete an entry
     * @param object - request object containing entry id
     * @return array of objects with all entries
     */
    public function delete(Request $request)
    {
        $getEntry = Entries::find($request->id);

        // return relevant response if no user can be found
        if (!$getEntry) {
            return response()
                ->json(
                    ["Error" => "Entry Not Found"],
                    404
                );
        }

        Entries::destroy($request->id);

        return response()->json('', 204);
    }
}
