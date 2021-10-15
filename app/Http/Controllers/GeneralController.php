<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use App\Models\Love;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    //

    public function homePage()
    {
        $user = null;

        if(Auth::check()){
            $user = User::find(Auth::id());
        }

        $request = new Request();

        if($request->cookie('userEmail'))
        {
            dd($request->cookie('userEmail'));
        }

        $gigs = Gig::cursorPaginate(10);

        return view('pages/home',['user' => $user, 'gigs' => $gigs]);
    }

    public function searchPage(Request $request)
    {
        $user = null;

        if(Auth::check())
        {
            $user = User::find(Auth::id());
        }

        $gigs = Gig::paginate(10);

        if($request->has('gig_name') || $request->has('category') || $request->has('min_budget') || $request->has('max_budget') || $request->has('author_name')){

            $min_budget = 0;
            $max_budget = 999999999999999999999999999;
            $author = null;

            if($request->get('min_budget') != null){
                $min_budget = $request->get('min_budget');
            }
            if($request->get('max_budget') != null){
                $max_budget = $request->get('max_budget');
            }

            if($request->get('author_name') != null)
            {
                $author = User::where('name','like','%'.$request->author_name.'%')->get('id');
            }

            $gigs = Gig::where('title','like','%'.$request->get('gig_name').'%')->
                        where('category','like','%'.$request->get('category').'%')->
                        where('basic_price','>=',$min_budget)->
                        where('premium_price','<=',$max_budget)->paginate(10);
        }

        return view('pages/searchPage',['user' => $user, 'gigs' => $gigs ]);
    }

    public function transactionPage()
    {

        $user = User::find(Auth::id());

        $transactions = null;

        if(Auth::check()){
            $transactions = Transaction::where('user_id',Auth::id())->paginate(10);
        }

        return view('pages/transaction',['user' => $user, 'transactions' => $transactions]);
    }

    public function lovedPage()
    {
        $user = User::find(Auth::id());

        $loves = null;

        if(Auth::check())
        {
            $loves = Love::where('user_id',Auth::id())->paginate(5);
        }

        return view('pages/lovedpage', ['user' => $user , 'loves' => $loves]);
    }
}
