<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagTodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $todos = Todo::all()->random(15);

        if($todos) {
            $tags = Tag::all();
            foreach ($todos as $todo) {
                $todo->tags()->attach($tags->random());
            }
        }
    }
}
