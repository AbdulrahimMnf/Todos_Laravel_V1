<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function index()
    {

        return view(
            'dashboard.Logs.index',
            [
                'logs' => Log::where('user_id', Auth::id())
                    ->latest()
                    ->paginate(30),
                'users' => []

            ]
        );
    }

    public function show()
    {
        return view(
            'dashboard.Logs.index',
            [
                'logs' => Log::latest()
                    ->paginate(30),
                'users' => User::select(['id', 'name'])->get()
            ]
        );
    }


    public function search($id)
    {
        return view(
            'dashboard.Logs.index',
            [
                'logs' => Log::where('user_id', $id)
                    ->latest()->paginate(30),
                'users' => User::select(['id', 'name'])->get()
            ]
        );
    }
}
