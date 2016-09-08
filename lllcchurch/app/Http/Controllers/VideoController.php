<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Videos;

class VideoController extends Controller
{
   public function store(Request $request)
    {   
        $videos =  new Videos();
        $title = $request->input('name');
        $detail = $request->input("detail");


        if($request->hasFile('vid_file'))
        {

            $vid_file = $request->file('vid_file');
            $original_extension = $vid_file->getClientOriginalExtension();
            $new_name = time().'.'.$original_extension;
            $vid_file ->move('..uploads/videos/', $new_name);
            $videos->vid_file =  $new_name;
            
        }
        else
        {
            Session::flash('error', 'uploaded file is not valid');
            return Redirect::to('video_upload');
        }

        
        $videos->title =  $title;
        $videos->detail =  $detail;
        $videos->save();
       
    return redirect('video_upload')->with('status', 'video uploaded');
    }
}
