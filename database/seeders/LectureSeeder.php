<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Lecture;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lc1 = new Lecture();
        $lc1->name = "Cycles";
        $lc1->description = "While, for, foreach";
        $lc1->save();

        $lc2 = new Lecture();
        $lc2->name = "Conditional statements";
        $lc2->description = "If/else, switch";
        $lc2->save();

        $lc3 = new Lecture();
        $lc3->name = "REACT Framework";
        $lc3->description = "REACT JS";
        $lc3->save();
    }
}
