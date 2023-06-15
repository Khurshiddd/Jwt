<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductItems extends Model
{
    use HasFactory;

    protected $table = 'product_items';
    protected $fillable =['product_id','size_id','color_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}
