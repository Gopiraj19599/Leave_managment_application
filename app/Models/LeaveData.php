<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveData extends Model
{
    use HasFactory;
    protected $fillable = ['staff_id','type_of_leave','description','first_code','second_code','third_code','status_one','status_two','status_three'];

    public function user_account()
    {
        return $this->belongsTo(StaffManagement::class);
    }

}
