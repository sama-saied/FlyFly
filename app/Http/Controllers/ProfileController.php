<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Contracts\UserContract;
use App\Http\Controllers\BaseController;
use App\Models\User;
class ProfileController extends Controller
{

    public function __construct()
    {
     $this->middleware('auth');
    }



    public function index(Request $request)

      {
        $user = Auth::user();
       return view('profiles.index',compact('user',$user));

      }


public function update(Request $request)
 {

    /**
       * fetching the user model
       */
      $user = Auth::user();
  
  
      /**
       * Validate request/input 
       **/
      $this->validate($request, [
          'first_name' => 'required|max:255|unique:users,first_name,'.$user->id,
          'last_name' => 'required|max:255|unique:users,last_name,'.$user->id,
          'email' => 'required|email|max:255|unique:users,email,'.$user->id,
          
       
      ]);
  
      /**
       * storing the input fields name & email in variable $input
       * type array
       **/
      
      $input = $request->only('first_name', 'last_name','password','address','city','country','phone_number');
  
  
  
      /**
       * Accessing the update method and passing in $input array of data
       **/
      $user->update($input);
  
      /**
       * after everything is done return them pack to /profile/ uri
       **/
      return back();

}
}