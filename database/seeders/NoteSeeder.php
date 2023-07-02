<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $notes = [];
        foreach (range(1, 10) as $index) {
            $note = [
                'body' => "Note $index",
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $notes[] = $note;
        }
        
        DB::table('notes')->truncate();
        DB::table('notes')->insert($notes);
    }
}