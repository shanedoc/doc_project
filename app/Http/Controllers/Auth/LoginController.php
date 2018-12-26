<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\User;
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
        $email = $request->input('email');
        $password = $request->input('password');
        $login = Auth::attempt(['email'=>$email,'password'=>$password,
            'is_admin'=>User::USER_LOGIN_STATUS,'status'=>User::USER_NORMAL_STATUS]);
        if($login){
            return $this->success();
        }else{
            return $this->error('用户名或密码错误');
        }

        return $this->sendFailedLoginResponse($request);

    }

    public function logout()
    {
        Auth::guard($this->getGuard())->logout();

        return redirect('show');
    }

    public function showLoginForm()
    {
        return view('loginAuth.login');
    }

    public function username()
    {
        return 'email';
    }

    protected function validateLogin($data)
    {
        return Validator::make($data,[
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
        ], [
            'required' => ':attribute 为必填项',
            'min' => ':attribute 最少为6位',
            'max' => ':attribute 最长为12位',
            'email' => ':attribute 格式不正确'
        ], [
            'email' => '邮箱',
            'password' => '密码'
        ]);
    }


}
