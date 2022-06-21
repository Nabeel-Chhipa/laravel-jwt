<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $primaryKey = 'member_id';
    function getGroup() {
        // return $this->hasOne('App\Models\Group', 'group_id');
        return $this->hasMany('App\Models\Group', 'group_id', 'group_id');
    }
}
