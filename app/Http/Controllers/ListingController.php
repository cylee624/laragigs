<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listings
    public function index() {
    //public function index(Request $request) {        
        //dd(request()->tag);
        //dd(Listing::latest()->filter(request(['tag','search']))->paginate(4));
        return view('listings.index', [
            //'heading' => 'Latest Listings',
            //'listings' => Listing::all()
            //'listings' => Listing::latest()->filter(request(['tag','search']))->get() 
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6) 
        ]);
    }

    // show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // show create form
    public function create() {
        return view('listings.create');
    }

    // store listing data
    public function store(Request $request) {
        //dd($request->file('logo'));
        //dd($request->file('logo')->store);
        //dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        //Session::flash('message','Listing Created');

        return redirect('/')->with('message','Listing created successfully!');

    }

    // show edit form
    public function edit(Listing $listing) {
        //dd($listing);
        //dd($listing->title);
        return view('listings.edit',['listing'=> $listing]);

    }


     // update listing data
     public function update(Request $request, Listing $listing) {
        //dd($request->file('logo'));
        //dd($request->file('logo')->store);
        //dd($request->all());

        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403,'Unauthroized Action');
        }


        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }

        

        $listing->update($formFields);

        //Session::flash('message','Listing Created');

        return back()->with('message','Listing updated successfully!');

    }

    // Delete Listing
    public function destory(Listing $listing) {
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403,'Unauthroized Action');
        }

        $listing->delete();
        return redirect('/')->with('message','Listing deleted successfully.');
    }

    // Manage Listings
    public function manage() {
        return view('listings.manage',['listings'=> auth()->user()->listings()->get()]);
    }


}
