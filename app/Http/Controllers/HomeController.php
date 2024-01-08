<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function accueille()
    {
        return view('accueille');
    }
  

    public function reche()
    {
        return view('search');
    } 

    public function profil(User $det_profil, Publication $publi)
    {
        $det_profil=User::where("id", Auth::id())->get();
        $publi=Publication::where('user_id', Auth::id())->get();

        return view('profil',compact('det_profil','publi'));
    } 
    public function faq()
    {
        return view('faq');
    } 

    public function dashboard(Publication $pub)
    {
        $pub=Publication::all();
       
        return view('welcome',compact('pub'));
    } 

}
