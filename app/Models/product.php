<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}
