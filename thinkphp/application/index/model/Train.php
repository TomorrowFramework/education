<?php

namespace app\index\model;

use think\Model;

class Train extends Model
{
    public function specialty()
    {
        return $this->belongsTo('Specialty');
    }

    public function getAllCourses()
    {
        $trainId = $this->id;
        $trainCourses = TrainCourse::where('train_id', '=', $trainId)->select();
        $courses = [];
        foreach ($trainCourses as $trainCourse) {
            $course = Course::get($trainCourse->course_id);
            array_push($courses, $course);
        }
        return $courses;
    }
}