<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $fillable = ['title', 'post_id'];

    public function post()
    {
        return $this->setConnection('mysql')->belongsTo(Post::class);
    }
}