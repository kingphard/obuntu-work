<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Sermons;

class AudioController extends Controller
{
       public function store(Request $request)
    {   
        $sermons =  new Sermons();
        $title = $request->input('name');
        $detail = $request->input("detail");
        $precher_name = $request->input('precher_name');


        if($request->hasFile('aud_file'))
        {

            $aud_file = $request->file('aud_file');
            $original_extension = $aud_file->getClientOriginalExtension();
            $new_name = time().'.'.$original_extension;
            $aud_file ->move('..uploads/audios/', $new_name);
            $sermons->aud_file =  $new_name;
            
        }
        else
        {
            Session::flash('error', 'uploaded file is not valid');
            return Redirect::to('audio_upload');
        }

        
        $sermons->title =  $title;
        $sermons->detail =  $detail;
        $sermons->precher_name = $precher_name;
        $sermons->save();
       
    return redirect('audio_upload')->with('status', 'sermon uploaded');
    }
}
