<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\list_column;

class List_ extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'List_';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'subtitle'
    ];

    public function list_columns()
    {
        return $this->hasMany(list_column::class , 'list_id', 'id');
    }
}
