<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class member_profile extends Model
{
    use HasFactory;
    protected $primaryKey ="profileId";
    protected $keyType = 'string';
    protected $fillable = [
    'profileId',
    'name',
    'phone',
    'handphoneNo',
    'email' ,
    'address' ,
    'congregation' ,
    'gender',
    'designation'];
    protected  static  function  boot()
{
    parent::boot();

    static::creating(function  ($model)  {
        $model->profileId = (string) Str::uuid();
    });
}
    /**
     * Get the user that owns the member_profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'profileId', 'profileId');
    }

    
}

