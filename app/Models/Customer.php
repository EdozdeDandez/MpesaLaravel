<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['firstName', 'surname', 'national_id', 'agent_id', 'created_by', 'updated_by', 'phone', 'date_of_birth'];

    protected $with = ['agent', 'user'];

    public function getDateOfBirthAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function getFullNameAttribute()
    {
        return "{$this->firstName} {$this->surname}";
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
