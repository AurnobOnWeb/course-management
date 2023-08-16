<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */



    public function edit(Request $request): View

    {   $id = Auth::user()->id;
        $user = User::find($id);
         $roles = Role::latest()->get();
         $data =$user->roles->pluck('id')->toArray();
        return view('admin.profileEdit',compact('roles','data'), [
            'user' => $request->user(),
        ]);
    }

    /** 
     * Update the user's profile information.
     */
    public function update($id ,Request $request)
    {   
         $request->validate([
        'name' => 'required',
        'phone' => 'required', 
        'addreess' => 'required',
        'image' => 'mimes:jpeg,png,jpg,gif', 
        ]);
        $user = User::find($id);
        $user->name =$request->name;
        $user->phone =$request->phone;
        $user->addreess =$request->addreess;
        $image = $request->image;

          if( $image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('backend/assets/images', $imageName);
            $user->image =$imageName;
             }
         $user->save();
        return redirect(url('/profile'))->with('massage','Your Profile Information is Updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
