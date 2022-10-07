<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class memberProfile extends Model
{
    use HasFactory;
    protected $primaryKey ="userId";
    protected $keyType = 'string';
    protected $fillable = [
    'userId',
    'name',
    'phone',
    'handphoneNo',
    'email' ,
    'address' ,
    'congregation' ,
    'is_volunteer',
    'is_staff',
    'gender',
    'designation'];
    protected  static  function  boot()
{
    parent::boot();

    static::creating(function  ($model)  {
        $model->userId = (string) Str::uuid();
    });
}

    
}

