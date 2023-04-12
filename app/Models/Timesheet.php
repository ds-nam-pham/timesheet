<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Timesheet extends Model
{
    // start, end
    use HasFactory;
    protected $appends = ['title','start','end'];
    protected $fillable = [
        'user_id',
        'task_id',
        'task_content',
        'date',
        'end_date',
        'time_spent',
        'difficulties',
        'plan'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function gettitleAttribute(){
        return $this->task_content;
    }

    public function getstartAttribute(){
        return $this->date;
    }

    public function getendAttribute(){
        return $this->end_date;
    }
}
