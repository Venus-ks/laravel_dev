<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['level','option','price','name','sosok','job','email','cellphone'];

    public function getLevelAttribute($value)
    {
        return config('cm.preRegistrationLevel.'.$value);
    }

    public function getOptionAttribute($value)
    {
        return(config('cm.preRegistrationOption.'.$value));
    }
}
