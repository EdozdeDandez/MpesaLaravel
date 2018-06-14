<?php
/**
 * Created by PhpStorm.
 * User: kandie
 * Date: 5/17/18
 * Time: 1:29 PM
 */

namespace App\Models;


use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = ['firstName', 'surname', 'name', 'agent_number', 'created_by', 'updated_by', 'date_of_birth'];

    public function getFullNameAttribute()
    {
        return "{$this->firstName} {$this->surname}";
    }

    public function getDateOfBirthAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
