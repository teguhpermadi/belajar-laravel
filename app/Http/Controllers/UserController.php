<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Image;

class UserController extends Controller
{
    public function profile(){
    	return view('user-profile.index', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
			$avatar_old = $request->avatar_old;
			Storage::delete('uploads/avatars/'.$avatar_old);

			$image      = $request->file('avatar');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();                 
            });

            $img->stream(); // <-- Key point

            //dd();
            Storage::disk('local')->put('public/uploads/avatars/'.'/'.$fileName, $img, 'public');

			$user = Auth::user();
    		$user->avatar = $fileName;
    		$user->save();
    	}

    	return view('user-profile.index', array('user' => Auth::user()) );

    }
}
