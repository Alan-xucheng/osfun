<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
class PublicController extends Controller
{
    public function getLogin() {

        return view('user.public.login');
    }
    public function postLogin(Request $request) {
       $rules = [
           'email' => 'required',
           'password' => 'required'
       ];
       $this->validate($request, $rules);

       if (Auth::guard('user')->attempt($request->only(['email', 'password']), $request->has('remember'))) {
           return redirect('/user/home/profile');
       }
       return back()->withInput()->withErrors(['password' => ['login failed']]);
    }
    public function getLogout() {
        Auth::guard('user')->logout();
        return redirect('user/public/login');
    }
    public function getRegister(){

        return view('user.public.register');
    }
}
