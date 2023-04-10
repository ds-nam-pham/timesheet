<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Timesheet extends Model
{
    use HasFactory;
    protected $appends = ['title'];
    protected $fillable = [
        'user_id',
        'task_id',
        'task_content',
        'date',
        'time_spent',
        'difficulties',
        'plan'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function gettitleAttribute(){
        return $this->task_content;
    }
}
