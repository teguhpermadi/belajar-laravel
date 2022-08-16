<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Image;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile($id = null){
        if($id == null)
        {
            $id = Auth::user();
        }
    	return view('user-profile.index', array('user' => $id) );
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

    	// return view('user-profile.index', array('user' => Auth::user()) );
        return redirect()->route('profile');

    }

    public function update_profile(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $user->name = $request->name;
        $user->tempatlahir = $request->tempatlahir;
        $user->tanggallahir = $request->tanggallahir;
        $user->alamat = $request->alamat;
        $user->jeniskelamin = $request->jeniskelamin;
        $user->save();

        return redirect()->route('profile');
    }

    public function update_emailpassword(Request $request)
    {
        $user = Auth::user();
        if($request->new_password)
        {
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required', 'min:8'],
                'new_confirm_password' => ['same:new_password'],
            ]);
            $user->password = Hash::make($request->new_password);
        }
   
        $user->email = $request->email;
        $user->username = $request->username;
        $user->save();
        return redirect()->route('profile');
    }

    public function delete_avatar(Request $request)
    {
        $avatar_old = $request->avatar_old;
		Storage::delete('uploads/avatars/'.$avatar_old);
        
        $user = Auth::user();
        $user->avatar = null;
        $user->save();

        return redirect()->route('profile');

    }

}
