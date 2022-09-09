<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'category_id',

    ];
    public function get_category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

}
