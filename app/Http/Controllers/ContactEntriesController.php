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
}
