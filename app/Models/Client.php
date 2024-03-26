<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'country'];

    public function country()
    {
        return $this->belongsTo(Countries::class);
    }

}
