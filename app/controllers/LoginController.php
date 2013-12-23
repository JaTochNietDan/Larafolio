<?php

class LoginController extends Controller
{
    function index()
    {
        return View::make('admin.login');    
    }
}
