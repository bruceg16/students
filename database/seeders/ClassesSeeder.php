<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::factory()
        ->count(5)
        ->sequence( fn ($secuence) => ['name'=>'Class' . $secuence->index + 1])
        ->has(
            Section::factory()
            ->count(2)
            ->state(
                new Sequence(
                    ['name'=>'Section A'],
                    ['name'=>'Section B'],
                )
            )
            ->has(
                Student::factory()
                ->count(2)
                ->state(
                    function (array $attributes, Section $section){
                        return ['class_id' => $section->class_id];
                    }
                )
                
                )
            )
            ->create();
    }
}
