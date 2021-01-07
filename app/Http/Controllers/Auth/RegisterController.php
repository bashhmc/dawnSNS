<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Request;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public $validateRules = [
            'username' => 'required|min:4|max:12',
            'mail' => 'required|min:4|max:12|unique:users,mail',
            'password' => 'required|numeric|digits_between:4,12|unique:users,password,|confirmed',
            'password_confirmation' => 'required',
    ];

    public $validateMessages = [
        "required" => "入力必須",
        "min" => "4文字以上",
        "max" => "12文字以内",
        "digits_between" => "4字以上12字以内",
        "numeric" => "英数字のみ",
        "unique" => "既に存在します",
        "confirmed" => "パスワードが一致しません"
    ];

    protected function postRegister(Request $request)
    {
        $data = Request::all();
        $val = Validator::make(
            $data,
            $this->validateRules,
            $this->validateMessages
    );
    // NGの場合
    if($val->fails()){
        return redirect('/register')->withErrors($val)->WithInput();
    }
    // OKの場合
            $this->create($data);
            return redirect('/added')->WithInput();
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function getRegister(){
        // Request $request
        // if($request->isMethod('post')){
        //     $data = $request->input();

        //     $this->create($data);
        //     return redirect('added');
        // }
        return view('auth.register');
    }

    public function added(){
        $postdata = Session::get('_old_input');

        return view('auth.added',compact('postdata'));
    }
}
