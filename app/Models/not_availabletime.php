<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class not_availabletime extends Model
{
    use HasFactory;
    protected $primaryKey ="profileId";
    public $timestamps = false;
    protected $keyType = 'string';
    protected $table = 'not_availabletime';
    protected $fillable = [
        'profileId',
        'na_time'
        
    ];
    
}
