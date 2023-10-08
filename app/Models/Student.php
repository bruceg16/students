<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Student extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'class_id',
        'section_id'
    ];

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function class(){
        return $this->belongsTo(Classes::class);
    }
}
