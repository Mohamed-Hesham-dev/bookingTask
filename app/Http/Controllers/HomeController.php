<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hotels=Hotel::get();
        
       return view('/home',compact('hotels'));
    }

    public function search(Request $request)
    {
        return view('/search');
    }

    public function fetchBranch(Request $request)
    {
        $data['branches'] = Branch::where("hotel_id", $request->hotel_id)->get();

        return response()->json($data);
    }
   
}
