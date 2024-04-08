<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    } 

    public function getTables()
    {
        $admins = Admin::all();
        return view('pages.tables', ['admins' => $admins]);
    }
}
