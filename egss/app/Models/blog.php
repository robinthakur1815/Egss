<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
  
    protected $fillable = [
        'title', 'slug','category_id','description','status','image','created_at','updated_at'
    ];
}
