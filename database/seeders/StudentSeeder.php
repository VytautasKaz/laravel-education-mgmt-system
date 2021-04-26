<?php

namespace Database\Seeders;

use \App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $st1 = new Student();
        $st1->name = "John";
        $st1->surname = "Cena";
        $st1->email = "john@cena.com";
        $st1->phone = "55502055108";
        $st1->save();

        $st2 = new Student();
        $st2->name = "Michael";
        $st2->surname = "Scott";
        $st2->email = "michael@scott.com";
        $st2->phone = "+3705216323";
        $st2->save();

        $st3 = new Student();
        $st3->name = "Dwight";
        $st3->surname = "Schrute";
        $st3->email = "dwight@scrute.com";
        $st3->phone = "123456789";
        $st3->save();
    }
}
