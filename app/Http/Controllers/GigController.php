<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use App\Models\Love;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'title' => 'required|string',
            'category' => 'required',
            'about' => 'required|string',
            'basic_price' => 'required|integer|lt:standard_price|lt:premium_price',
            'basic_price_description' => 'required|string',
            'standard_price' => 'required|integer|lt:premium_price|gt:basic_price',
            'standard_price_description' => 'required|string',
            'premium_price' => 'required|integer|gt:basic_price|gt:standard_price',
            'premium_price_description' => 'required|string',
            'image' => 'required'
        ]);

        $image = $request->image;

        dd($image);

        $image_path = Storage::disk('local')->put('public',$image);
        $image_path = explode("/",$image_path);

        Gig::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'category' => $request->category,
            'about' => $request->about,
            'basic_price' => $request->basic_price,
            'basic_description' => $request->basic_price_description,
            'standard_price' => $request->standard_price,
            'standard_description' => $request->standard_price_description,
            'premium_price' => $request->premium_price,
            'premium_description' => $request->premium_price_description,
            'images' => $image_path[1],
        ]);

        return redirect('/profile/'.Auth::id());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $gig = Gig::find($id);

        $user = User::find(Auth::id());

        return view('/pages/gigdetailpage',['gig' => $gig, 'user' => $user]);
    }

    public function showInsertPage()
    {

        $user = User::find(Auth::id());

        return view('pages/editgigpage', ['gig' => null , 'user' => $user]);
        
    }
    
    public function showEditPage($id)
    {
        $gig = Gig::find($id);
        
        $user = User::find(Auth::id());
        
        return view('pages/editgigpage', ['gig' => $gig , 'user' => $user]);
    }

    public function showCheckoutPage($id, $type)
    {   
        $gig = Gig::find($id);

        $user = User::find(Auth::id());

        return view('pages/checkoutpage',['gig' => $gig, 'type' => $type, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $request->validate([
            'title' => 'required|string',
            'category' => 'required',
            'about' => 'required|string',
            'basic_price' => 'required|integer|lt:standard_price|lt:premium_price',
            'basic_price_description' => 'required|string',
            'standard_price' => 'required|integer|lt:premium_price|gt:basic_price',
            'standard_price_description' => 'required|string',
            'premium_price' => 'required|integer|gt:basic_price|gt:standard_price',
            'premium_price_description' => 'required|string',
            'image' => 'required'
        ]);

        $image = $request->image;

        $image_path = Storage::disk('local')->put('public',$image);
        $image_path = explode("/",$image_path);

        $gig = Gig::find($id);

        $gig->title = $request->title;
        $gig->category = $request->category;
        $gig->about = $request->about;
        $gig->basic_price = $request->basic_price;
        $gig->basic_description = $request->basic_price_description;
        $gig->standard_price = $request->standard_price;
        $gig->standard_description = $request->standard_price_description;
        $gig->premium_price = $request->premium_price;
        $gig->premium_description = $request->premium_price_description;
        $gig->images = $image_path[1];

        $gig->save();

        return redirect('/gig/edit/'.$gig->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $user = User::find(Auth::id());

        $gig = Gig::find($id);

        $gig->delete();

        return redirect('/profile/'.Auth::id());
    }
}
