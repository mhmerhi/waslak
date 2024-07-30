<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_id',
        'driver_id',
        'type',
        'from',
        'to',
        'cost',
        'profit',
        'client_paid',
        'driver_paid',
        'driver_paid_by_account',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
