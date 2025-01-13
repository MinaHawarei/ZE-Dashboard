<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class language extends Model
{
    use HasFactory;


    protected $fillable = [
        'abbr',
        'local',
        'name',
        'native',
        'flag',
        'direction',
        'active',
    ];
    public function scopeActive(){
        return $this->all()->where('active',1);
    }
    public function scopeSelect(){
        return $this->all()->select('id','abbr','local','name','native','flag','direction','active');
    }
}
