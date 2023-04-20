<?php

namespace App\Exports;

use App\Models\User;
use App\Services\User\UserServiceInterface;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class UsersExport implements FromCollection, WithHeadings
{

    protected $userService;
    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userService = $userServiceInterface;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->userService->getUserList();
    }

    public function headings() :array
    {
    	return ["Name", "Email", "Avatar", "Decription", "Role"];
    }
}
