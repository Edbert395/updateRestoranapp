<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'menu_id', 'quantity', 'status', 'order_date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }
}
