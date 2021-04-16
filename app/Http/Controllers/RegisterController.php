<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

final class RegisterController extends Controller
{
    /**
     * Function to show login view
     * 
     * @return \Illuminate\View\View
     */
    public function index() 
    {
        return view('register');
    }

    /**
     * Function to register via ORM (Default)
     * 
     * @param RegisterRequest $registerRequest
     * @return \Illuminate\Http\Response
     */
    public function registerViaOrm(RegisterRequest $registerRequest) 
    {
        $validatedData = $registerRequest->validated();
        $users = new User();
        $users->create($validatedData);
        return $this->registerSucessCallback();
    }

    /**
     * Function to register via ORM ver 2
     * 
     * @param RegisterRequest $registerRequest
     * @return \Illuminate\Http\Response
     */
    public function registerViaOrmVer2(RegisterRequest $registerRequest)
    {
        $validatedData = $registerRequest->validated();
        User::create($validatedData);
        return $this->registerSucessCallback();
    }

    /**
     * Function to register via ORM ver 3 (Without validation)
     * 
     * @param Request $registerRequest
     * @return \Illuminate\Http\Response
     */
    public function registerViaOrmVer3(Request $registerRequest) 
    {
        $data = $registerRequest->except('password_confirmation');
        $users = new User();
        $users->create($data);
        //User::create($data); (Choose one)
        return $this->registerSucessCallback();
    }

    /**
     * Function to register user via Query Builder
     * 
     * @param RegisterRequest $registerRequest
     * @return \Illuminate\Http\Response
     */
    public function registerViaQueryBuilder(RegisterRequest $registerRequest) 
    {
        $validatedData = $registerRequest->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);
        DB::table('users')->insert($validatedData);
        return $this->registerSucessCallback();
    }

    /**
     * Function to register user via Query Builder ver 2 (Without Validation)
     * 
     * @param Request $registerRequest
     * @return \Illuminate\Http\Response
     */
    public function registerViaQueryBuilderVer2(Request $registerRequest) 
    {
        $data = $registerRequest->except(['password_confirmation', '_token']);
        $data['password'] = Hash::make($data['password']);
        DB::table('users')->insert($data);
        return $this->registerSucessCallback();
    }

    /**
     * Function to register user via manual
     * 
     * @param Request $registerRequest
     * @return \Illuminate\Http\Response
     */
    public function registerViaManual(RegisterRequest $registerRequest) 
    {
        $validatedData = $registerRequest->validated();
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->save();
        return $this->registerSucessCallback();
    }

    /**
     * Function to register user via manual Ver2 (Without Validation)
     * 
     * @param Request $registerRequest
     * @return \Illuminate\Http\Response
     */
    public function registerViaManualVer2(Request $registerRequest) 
    {
        $data = $registerRequest->all();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();
        return $this->registerSucessCallback();
    }

    /**
     * Callback when register is complete
     * 
     * @return \Illuminate\Http\Response
     */
    private function registerSucessCallback() 
    {
        return redirect()->route('home')->with('status', 'Success Register User');
    }
}