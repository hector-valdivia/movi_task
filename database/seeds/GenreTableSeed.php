<?php

use Illuminate\Database\Seeder;

class GenreTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Genre::insert([
            [ 'name' => 'Horror' ],
            [ 'name' => 'Action' ],
            [ 'name' => 'Comedy' ],
        ]);
    }
}
