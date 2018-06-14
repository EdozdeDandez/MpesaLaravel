<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'description', 'code', 'created_by', 'updated_by', 'product_id'];

    protected $with = ['user', 'product'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}
