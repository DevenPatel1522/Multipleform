<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = "profiles";

    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'birthdate',
        'email',
        'address',
        'token',
        'ssc_year',
        'ssc_marks',
        'hsc_year',
        'hsc_marks	',
        'bachelor_year',
        'bachelor_CGPA',
        'master_year',
        'master_CGPA',
    ];
    public function image()
    {
        return $this->hasOne('App\Models\image');
    }
}
