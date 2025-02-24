<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'table_number', 'contact'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
