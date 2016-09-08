<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MediaController extends Controller
{
    public function index()
    {

 
    }

    public function create()
    {
      return view("Home")

    }

    public function store(Request $request){

      media::create(Request::all());

      return "Data saved";
    }

    public function show($id){


    }
   public function edit($id){


   }

   public function update($id){


   }

   public function destroy($id){


   }

}
