<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exam_id',
        'user_id',
        'result',
        'remark',
        'grade',
        'subject_id',
        'teacher_id',
    ];

    public function student(){
      return $this->belongsTo(User::class);
    }

    public function exam(){
      return $this->belongsTo(Exam::class);
    }

    public function subject(){
      return $this->belongsTo(Subject::class);
    }





}
