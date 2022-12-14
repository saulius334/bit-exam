<?php

namespace App\Models;

use App\Models\BookCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    protected $fillable = ['name', 'description', 'isbn', 'photo', 'reserved', 'pages', 'category_id', 'favorited_by'];

    use HasFactory;

    public function getCategory() {
        return $this->belongsTo(BookCategory::class, 'category_id', 'id');
    }
}
