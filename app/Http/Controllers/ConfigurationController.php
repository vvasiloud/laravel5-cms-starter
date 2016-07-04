<?php

namespace App\Http\Controllers;

class ConfigurationController extends Controller
{
    public function all($entity)
    {
        return view('layout.admin.configuration');
    }
    public function __construct() { }

    public function index()
    {

        return view('layout.admin.configuration');
    }

}