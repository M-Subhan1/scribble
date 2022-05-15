<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Component;

class Page extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Page';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'journalId',
        'number',
    ];

    public function components()
    {
        return $this->hasMany(Component::class , 'pageId', 'id');
    }
}
