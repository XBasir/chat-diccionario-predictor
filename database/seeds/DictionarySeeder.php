<?php

use Illuminate\Database\Seeder;

class DictionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $words = [
            'hola',
            'actitud',
            'aptitud',
        	'altitud',
        	'deporte',
        	'cruzar'
        ];
        
        foreach ($words as $word) {
           $dictionary = \App\Dictionary::create(['word' => $word]);
        }
    }
}
