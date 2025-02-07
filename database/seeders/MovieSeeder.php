<?php

namespace Database\Seeders;

use App\Models\Movie;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            'Action','Animation','Horror','Syphy'
        ];

        foreach($movies as $movie){
            $data = new Movie();
            $data->name = $movie;
            $data->save();
        }
    }
}
