<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'text', 'priority', 'status',
    ];


    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return  $this->hasOne(User::class, 'user_id');
    }

    public function manager(): HasOne
    {
        return  $this->hasOne(User::class, 'manager_id');
    }
}
