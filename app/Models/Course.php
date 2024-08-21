<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table='courses';

    protected $fillable =[
       "name",
       "content",
       "price",
       "duration", 
       "instructor_id" ,
       "instructor_name"  
    ];

    public function instructor()
    {
        return $this->has(Instructor::class);
    }
    
    
    public function users(){
        return $this->belongsToMany(User::class,'enrollements');
    }

    public function enrollments(){
        return $this->hasMany(Enrollement::class);
    }
}
