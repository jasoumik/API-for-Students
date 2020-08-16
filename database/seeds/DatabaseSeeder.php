<?php

use App\Course;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Course::class,10)->create();
        foreach(Course::all() as $course){
            $students =\App\Student::inRandomOrder()->
            take(rand(1,3))->pluck('id');
            
            foreach($students as $student){
                $course->students()->attach($students);
            }
        }
    }
}
