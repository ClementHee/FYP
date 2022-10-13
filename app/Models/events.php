<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;
    protected $primaryKey ="eventId";
    protected $keyType = 'string';
    protected $fillable = [
        'eventId',
        'name' ,
        'type',
        'date_time',
        'venue',
        'pic' 
    ];
    protected  static  function  boot()
{
    parent::boot();

    static::creating(function  ($model)  {
        $model->eventId = (string) Str::uuid();
    });
}

}
