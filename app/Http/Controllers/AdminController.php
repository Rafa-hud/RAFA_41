<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Muestra la página de inicio del panel de administración.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.index'); // Retorna la vista de administración
    }
}