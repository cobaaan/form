<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'detail'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeDateSearch($query, $created_at) {
        if(!empty($created_at)) {
            $query->where('created_at', $created_at);
        }
    }

    public function scopeCategorySearch($query, $content) {
        if(!empty($content)) {
            $query->where('content', $content);
        }
    }

    public function scopeKeywordSearch($query, $keyword) {
        /*if(!empty($keyword)) {
            $query->where('content', 'like', '%'. $keyword . '%');
        }*/
    }
}
