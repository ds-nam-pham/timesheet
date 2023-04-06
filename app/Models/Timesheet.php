<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'task_id',
        'task_content',
        'date',
        'time_spent',
        'difficulties',
        'plan'
    ];
}
