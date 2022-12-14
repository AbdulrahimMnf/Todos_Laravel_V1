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
            'Dashboard.Logs.index',
            [
                'logs' => Log::where('user_id', Auth::id())
                    ->latest()
                    ->paginate(20)
            ]
        );
    }

    public function show()
    {
        return view(
            'Dashboard.Logs.index',
            [
                'logs' => Log::latest()
                    ->paginate(20)
            ]
        );
    }
}
