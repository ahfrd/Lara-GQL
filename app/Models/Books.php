<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books';

    protected $fillable = [
        'year',
        'title',
        'genre',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
    ];
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function sales()
    {
        return $this->hasMany(Sales::class);
    }
}
