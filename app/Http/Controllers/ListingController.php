<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
    Common resource Routes
    index - show all listings
    show - show single listing
    create - show form to create new listing
    store - store new listing
    edit - show form to edit listing
    update - update listing
    destroy - delete listing
*/

class ListingController extends Controller
{
    public function index()
    {

        $tag = (request()->has('tag') && request()->tag != '') ? request()->tag : ((request()->has('search') && request()->search != '') ? request()->search : "");

        $listings = Listing::where(function ($query) use ($tag) {
            $query->where('title', 'like', "%$tag%")
                ->orWhere('description', 'like', "%$tag%")
                ->orWhere('tags', 'like', "%$tag%");
        })->latest()->get();

        return view('listings/index', [
            "listings" => $listings,
        ]);
    }

    public function show($id)
    {
        $listing = Listing::find($id);
        if ($listing) {
            return view("listings/show", ["listing" => $listing]);
        } else {
            abort(404);
        }
    }

    public function create()
    {
        return view("listings/create");
    }

    public function store(Request $request)
    {
        // dd($request->tags);
        $validated = $request->validate([
            "title" => "required",
            "company" => ["required", "unique:listings,company"],
            "location" => "required",
            "website" => "required",
            "email" => ["required", "unique:listings,email", "email"],
            "tags" => "required",
            "description" => "required"
        ]);

        Listing::create($validated);

        return redirect("/")->with("message", "Listing created successfully!");
    }
}
