<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_types extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey ="eventtypeId";
    protected $keyType = 'string';
    protected $fillable = [
    'name',
    ];
}
