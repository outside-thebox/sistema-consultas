<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ControllerBusqueda extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return \View::make("busquedas.index");
    }

    public function getData()
    {
        return "Busqueda";
    }
}
