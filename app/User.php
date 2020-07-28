<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['name'];

    /**
     * @return BelongsTo
     */
    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function staff(): HasMany
    {
        return $this->hasMany(User::class, 'manager_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'user_id', 'id');
    }

    /**
     * @return string
     */
    public function getNameAttribute(): string
    {
        return "$this->last_name $this->first_name $this->middle_name";
    }

    /**
     * @return mixed
     */
    public function getAllTasksAttribute()
    {
        if ($this->staff->isEmpty()) {
            return $this->tasks;
        }
        $tasks = $this->tasks;

        foreach ($this->staff as $person) {
            $tasks = $tasks->merge($person->tasks);
        }

        return $tasks->sortByDesc('updated_at');
    }
}
