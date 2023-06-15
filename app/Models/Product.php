<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable =['produc_category_id','title','body','price'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function productitems(): HasMany
    {
        return $this->hasMany(ProductItems::class);
    }
    public function attrebutes(): HasMany
    {
        return $this->hasMany(Attributes::class);
    }

    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Sizes::class, 'product_items', 'product_id', 'size_id');
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Colors::class, 'product_items', 'product_id', 'color_id');
    }

}
