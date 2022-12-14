<?php
namespace App\Traits;

use App\Exports\UserLogExport;
use Maatwebsite\Excel\Facades\Excel;

/**
 *
 */
trait ExportUserInfo
{

    public function Export()
    {
        $path =  time() . '_' . rand(100, 1000) . '\log.xlsx';
        Excel::store(new UserLogExport(), $path, 'excel_uploads');
        return public_path() . '\\' . $path;
    }

}
