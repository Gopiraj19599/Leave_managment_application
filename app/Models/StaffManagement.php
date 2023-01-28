<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffManagement extends Model
{

    use HasFactory;
    protected $fillable = ['staff_id', 'first_name','last_name','date_of_birth','email','phone_number','position'];

    public function create_user()
    {
        return $this->hasOne(UserAccounts::class,'user_id','id');
    }
}
