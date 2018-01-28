<?php
namespace App\Http\Controllers\Back;

use App\ {
    Http\Controllers\Controller,
    Http\Requests\SearchRequest,
    Models\Articles,
    Models\Users,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{


    public function index()
    {
        
        return view('back.login');
    }
    public function doLogin(Request $req){
    $rules = array(
        'username'    => 'required', 
        'password' => 'required|alphaNum' 
    );

   
    $validator = \Validator::make(Input::all(), $rules);

  
    if ($validator->fails()) {
        return Redirect::to('login')
            ->withErrors($validator) // send back all errors to the login form
            ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
    } else {

        // create our user data for the authentication
        $userdata = array(
            
            'password'  => '123',
            'username'     => 'admin'
        );
        // attempt to do the login
        if(Auth::attempt(Input::only('username', 'password'))){

            // validation successful!
            // redirect them to the secure section or whatever
            // return Redirect::to('secure');
            // for now we'll just echo success (even though echoing in a controller is bad)
            //return Redirect::to('Home');
            echo 'SUCCESS!';
            print_r(Auth::user());
            //echo  Auth::user()->username;

        } else {
            // validation not successful, send back to form
            echo "faild";

        

    }
}
    
    }
//    public function doLogin(Request $req){
//    
//        $username = $req->input('username');
//        $password = $req->input('password');
//        $rules = array ('username' => 'required','password' => 'required');
//        $v = \Validator::make (Input::all (), $rules);
//        if($v->fails()){
//        Input::flash();
//        return Redirect::to('login')->withInput()->withErrors ($v->messages ());    
//        }else{
//        $obj = new Users();
//        $user = $obj->CheckLogin($username,$password);
//        if(!empty($user)){
////        $userdata = array (
////            'username' => $user->username,
////            'password' => $user->password
////            );    
//        $credentials = $req->only('username', 'password');    
//        //print_r(\Auth::attempt ($userdata));die;    
//        if(Auth::attempt($credentials)){
////        Session::put('username',$user->username);    
////        Session::put('id',$user->id);    
//        return Redirect::to('home');
//        } else {
//        // authentication fail, back to login page with errors
//        return Redirect::to('login')->withErrors(['msg' => 'username or password is inncorrect111']); 
//        }    
//            
//        }else{
//            return Redirect::to('login')->withInput()->withErrors (['msg' => 'username or password is inncorrect']); 
//        }
//        }
//    }
 
}
?>