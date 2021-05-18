<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_name',
        'password',
        'type',
        'bio',
        'l_name',
        'position',
        'dob',
        'form',
        'sex',
        'username',
        'joined_on',
        'profile_pic',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // /**
    //  * The attributes that should be cast to native types.
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

       

    // public function results()
    // {
    //     return $this->hasMany(Result::class, 'student_id');
    // }



    public function messages(){
      return $this->hasMany(Message::class, 'parent_id');
    }


    public function studentSubjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject', 'user_id', 'subject_id');
    }


    public function subjectsTeacher()
    {          
            return $this->belongsToMany(Subject::class, 'teacher_subject', 'user_id', 'subject_id')->withPivot('class');
    }

    public function examResult()
    {
        return $this->hasMany(Result::class);
    }
}
