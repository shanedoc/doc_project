<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $validator = $this->validateLogin($request->all());
        if($validator->fails()){
            $error = $validator->errors()->toArray();
            $error = $this->geterrorMsg($error);
            return $this->error($error);
        }

        if ($this->attemptLogin($request)) {
            $user = Auth::user();
            if($user->status!=1){
                auth()->logout();
                return $this->error(config('response.user_status_unnornal'));
            }
            if($user->is_admin !=0){
                auth()->logout();
                return $this->error(config('response.user_msg_error'));
            }
            return $this->success(['msg'=>'user_login_success']);
        }else{
            return $this->error(config('response.user_msg_error'));
        }

        return $this->sendFailedLoginResponse($request);

    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/');
    }

    public function showLoginForm()
    {
        return view('loginAuth.login');
    }

    public function username()
    {
        return 'username';
    }

    protected function validateLogin($data)
    {
        return Validator::make($data,[
            'username' => 'required',
            'password' => 'required|min:6|max:12',
        ], [
            'required' => ':attribute 为必填项',
            'min' => ':attribute 最少为6位',
            'max' => ':attribute 最长为12位',
        ], [
            'username' => '用户名',
            'password' => '密码'
        ]);
    }


}
