<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $fillable = ['total_price', 'status', 'created_by', 'updated_by', 'address_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function address()
    {
        return $this->belongsTo(UserAddress::class, 'address_id');
    }
}
