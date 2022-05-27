<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Calendar extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Calendar';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
    ];

    public function events()
    {
        return $this->hasMany(Event::class , 'calendar_id', 'id');
    }
}
