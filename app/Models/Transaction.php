<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['customer_id', 'amount', 'destination', 'service_id', 'reference', 'message'];

    protected $with = ['customer', 'service'];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function service()
    {
        return$this->belongsTo(Service::class, 'service_id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}
