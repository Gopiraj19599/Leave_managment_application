<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccounts extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','user_name','email','password','account_type'];


    public function staff()
    {
        return $this->belongsTo(StaffManagement::class);
    }
}
