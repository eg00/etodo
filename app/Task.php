<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'text', 'priority', 'status', 'manager_id', 'finish_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'finish_at',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['name'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['manager'];

    protected static function boot()
    {
        parent::boot();

        // Order by updated_at DESC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('updated_at', 'DESC');
        });
    }

    /**
     * @return BelongsTo
     */
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function manager(): belongsTo
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    /**
     * @return string
     */
    public function getCssClassAttribute(): string
    {
        if ('completed' === $this->status) {
            $class = 'text-success';
        } else {
            if ($this->finish_at < Carbon::today()) {
                return 'text-danger';
            }
            $class = 'text-black-50';
        }

        return $class;
    }

    /**
     * @return \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed|null
     */
    public function getByAttribute()
    {
        return optional($this->manager)->name;
    }

    /**
     * @return string
     */
    public function getNameAttribute(): string
    {
        return $this->user->name;
    }

    /**
     * @return string
     */
    public function getDateAttribute(): string
    {
        $now = Carbon::now();

        if ($this->finish_at->isToday()) {
            return 'Today';
        }
        if ($this->finish_at->between($now->copy()->startOfWeek(), $now->copy()->endOfWeek())) {
            return 'Week';
        }
        if ($this->finish_at->greaterThan($now->copy()->endOfWeek())) {
            return 'Future';
        }

        return 'Past';
    }
}
