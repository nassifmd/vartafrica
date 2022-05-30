<?php

namespace App\Http\Controllers;

use Excel;

use Illuminate\Http\Request;

use App\Http\Controllers\ExportController;

use App\Exports\UserExport;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new UserExport, 'users.xlsx');
        
    }
}
