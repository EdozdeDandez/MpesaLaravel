<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'created_by', 'updated_by'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}
