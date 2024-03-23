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
/*
    public function scopeFirstNameSearch($query, $text) {
        if(!empty($text)) {
            $query->where('first_name', 'LIKE', "%{$text}%");
        }
    }

    public function scopeLastNameSearch($query, $text) {
        if(!empty($text)) {
            $query->where('last_name', 'LIKE', "%{$text}%");
        }
    }

    public function scopeEmailSearch($query, $text) {
        if(!empty($text)) {
            $query->where('email', 'LIKE', "%{$text}%");
        }
    }

    public function scopeGenderSearch($query, $gender) {
        if(!empty($gender)) {
            $query->where('gender', $gender);
        }
    }

    public function scopeCategorySearch($query, $category) {
        if(!empty($category)) {
            $query->where('category_id', $category);
        }
    }

    public function scopeDateSearch($query, $date) {
        if(!empty($date)) {
            $query->whereDate('created_at', $date);
        }
    }
*/
    public function scopeAllSearch($query, $request) {
        $text = $request->input('text');

        $gender = $request->input('gender');
        $category = $request->input('category');
        $date = $request->input('date');

        if(!empty($text)) {
            $query->where('first_name', 'LIKE', "%{$text}%")
            ->orWhere('last_name', 'LIKE', "%{$text}%")
            ->orWhere('email', 'LIKE', "%{$text}%");
        }
        if(!empty($gender)) {
            $query->where('gender', $gender);
        }
        if(!empty($category)) {
            $query->where('category_id', $category);
        }
        if(!empty($date)) {
            $query->whereDate('created_at', $date);
        }
    }
}
