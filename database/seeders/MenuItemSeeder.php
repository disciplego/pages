<?php

namespace Dgo\Pages\Database\Seeders;

use Dgo\Pages\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        {
            $data = config('menus.items');

            foreach ($data as $menuSlug => $items) {
                // Find the menu with the given slug
                $menu = Menu::whereSlug($menuSlug)->first();

                if ($menu) {
                    foreach ($items as $itemData) {
                        // Insert the item with the provided data
                        $itemId = DB::table('items')->insertGetId(array_merge([
                            'created_at' => now(),
                            'updated_at' => now(),
                        ], $itemData));

                        // Attach the item to the menu
                        $menu->items()->attach($itemId);
                    }
                }
            }
        }
}
