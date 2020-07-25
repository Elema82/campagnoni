<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminUsersControllers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('adminlte::users');
    }

    public function store(){
        return [];
    }

    public function update(){
        return [];
    }

    public function show(){
        return [];
    }
}