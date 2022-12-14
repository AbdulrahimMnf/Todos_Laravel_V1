<?php

namespace App\Exports;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserLogExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Log::where('user_id', Auth::id())->get();
    }
}
