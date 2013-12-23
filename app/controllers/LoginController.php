<?php

class LoginController extends Controller
{
    function index()
    {
        return View::make('admin.login');
    }
    
    function login()
    {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|min:3'
        );
        
        $validator = Validator::make(Input::all(), $rules);
        
        if($validator->fails())
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
                
        $auth = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
            
        if(Auth::attempt($auth))
        {
            return Redirect::to('/admin');
        }
        else
            return Redirect::to('login')
                ->withErrors(array('errors' => 'Username/password not found!'))
                ->withInput(Input::except('password'));
    }
    
    function logout()
    {
        Auth::logout();
		
		return Redirect::to('login');
    }
}