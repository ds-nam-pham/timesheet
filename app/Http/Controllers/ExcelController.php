<?php

namespace App\Http\Controllers;

use App\Models\User;
use Maatwebsite\Excel\Excel;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Services\User\UserServiceInterface;

class ExcelController extends Controller
{
    //
    private $excel;
    protected $userSevice;
    public function __construct(Excel $excel, UserServiceInterface $userServiceInterface)
    {
        $this->userSevice = $userServiceInterface;
        $this->excel = $excel;
    }
    public function export()
    {
        
        // $user = $this->userSevice->getUserList();
        // dd($user);
        return $this->excel->download(new UsersExport($this->userSevice), 'users.xlsx');
    }
}
