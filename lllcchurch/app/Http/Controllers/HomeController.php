<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Media;



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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media_cat = category::all();
        return view('home')->with('media_cat', $media_cat);
    }
    
    public function store(Request $request)
    {   
        $media =  new Media();
        $title = $request->input('name');
        $description = $request->input("description");
        $category_id = $request->input("category_id");


        if($request->hasFile('image'))
        {

            $file = $request->file('image');
            $original_extension = $file->getClientOriginalExtension();
            $new_name = rand(11111,99999).'.'.$original_extension;
            $file ->move('..uploads/', $new_name);
            $media->file =  $new_name;

        }
        else
        {
            Session::flash('error', 'uploaded file is not valid');
            return Redirect::to('home');
        }

        
        $media->title =  $title;
        $media->description =  $description;
        $media->category_id =  $category_id;
        $media->save();
       
    return redirect('home')->with('status', 'data uploaded');
    }
    public function create(){

        return view('home');
    }

}
