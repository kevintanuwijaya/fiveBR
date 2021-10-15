<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
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
        $user = User::find($id);

        $gigs = Gig::where('user_id',$user->id)->get();

        return view('pages/profile',['user' => $user,'gigs' => $gigs]);
    }

    public function showEdit($id)
    {
        $user = User::find($id);

        return view('pages/editprofile',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $image_path = null;

        if($request->picture != null)
        {
            $image = $request->picture;

            $image_path = Storage::disk('local')->put('public',$image);
            $image_path = explode("/",$image_path);
        }


        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->about = $request->about;
        $user->profile_picture = $image_path[1];
        $user->description = $request->description;

        $user->save();

        return redirect('/profile/edit/'.$user->id);
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
    }
}
