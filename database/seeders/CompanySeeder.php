<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $companies = [];
        foreach (range(1, 10) as $index) {
            $name = "Company $index";
            $company = [
                'name' => $name,
                'address' => "Address $name",
                'website' => "Website $name",
                'email' => "Email $name",
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $companies[] = $company;
        }

        DB::table('companies')->truncate();
        DB::table('companies')->insert($companies);
    }
}