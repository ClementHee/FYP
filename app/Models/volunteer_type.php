<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class volunteer_type extends Model
{
    use HasFactory;
    protected $primarykey= 'profileId';
    
    protected $table = 'volunteer_type';
    protected $fillable = [
        'profileId',
        'roles'
    
    ];
    
    
}
