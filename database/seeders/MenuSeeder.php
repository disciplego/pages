<?php

namespace Dgo\Pages\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        {
            $data = config('menus.menus');

            foreach ($data as $item) {
                DB::table('menus')
                    ->insert(array_merge([
                        'created_at' => now(),
                        'updated_at' => now(),
                    ], $item));
            }
        }
}
