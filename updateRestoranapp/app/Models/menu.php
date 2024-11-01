<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category', 'price', 'available'];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
