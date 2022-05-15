<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Page;

class Journal extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Journal';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'authorId',
        'title',
        'description'
    ];

    public function pages()
    {
        return $this->hasMany(Page::class , 'journalId', 'id');
    }
}
