<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesPort extends Model
{
    public function multipic(){
        return $this->belongsTo(Post::class);
    }
    use HasFactory;
    protected $fillable = [
        'categories',
    ];
}
