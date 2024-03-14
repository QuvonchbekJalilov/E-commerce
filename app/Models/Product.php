<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'description',
        'specification',
        'price',
        'stock',
    ];

    public $sortable = [
        'name',
        'price',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function specifications()
    {
        return $this->hasMany(Specification::class);
    }
}
