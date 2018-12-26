<?php
/**
 * Created by PhpStorm.
 * User: xuke
 * Date: 2018/12/26
 * Time: 11:03
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function register(Request $request)
    {
        try {
            $rules = [
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6|max:12'
            ];

            $messages = [
                'username.required' => '请输入用户名',
                'email.required' => '请输入邮箱',
                'email.email' => '请输入正确的邮箱格式',
                'password.required' => '请输入密码',
                'password.min' => '密码最少6位',
                'password.max' => '密码最长6位',
            ];

            $this->validate($request, $rules, $messages);

            $username = $request->input('username');
            $email = $request->input('email');
            $password = $request->input('password');

            $user = new User();
            $user->username = $username;
            $user->email = $email;
            $user->password = bcrypt($password);
            $user->save();

            Auth::login($user);
            return redirect('index');

        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

}