<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'name'
    ];

    public $sortable = [
        'name',
        'created_at'
    ];


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
