<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Auth;
class PublicController extends Controller
{
    public function getLogin(Request $request) {
        
        return view('admin.public.login');

    }
    public function postLogin(Request $request) {
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        $this->validate($request, $rules);

        if (Auth::guard('admin')->attempt($request->only(['email', 'password']), $request->has('remember'))) {
            return back()->withInput()->withErrors(['password' => ['login successfully']]);
        }
        return back()->withInput()->withErrors(['password' => ['login failed']]);
    }
    public function getLogout() {
        Auth::guard('admin')->logout();
        return redirect('admin/public/login');
    }
}