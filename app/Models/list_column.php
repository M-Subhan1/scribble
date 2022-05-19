<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\list_entry;

class list_column extends Model
{
            /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'list_column';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'list_id',
        'name'
    ];

    public function list_entries()
    {
        return $this->hasMany(list_entry::class , 'column_id', 'id');
    }
}
