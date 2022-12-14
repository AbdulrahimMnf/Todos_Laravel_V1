<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function info()
    {
        return view('Dashboard.portfolios.edit', ['portfolio' => User::find(Auth::id())]);
    }
}
