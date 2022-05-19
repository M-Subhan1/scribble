<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class list_entry extends Model
{
           /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'list_entry';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'column_id',
        'content',
    ];
}
