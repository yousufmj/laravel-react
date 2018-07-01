<?php

namespace App\Http\Controllers;

use App\Entries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $entries = Entries::create($request->all());

        return response()->json($entries, 201);
    }
}
