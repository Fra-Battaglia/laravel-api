<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['html', 'css', 'javascript', 'vue', 'php', 'laravel'];
        foreach ($technologies as $item) {
            $new_technology = new Technology();
            $new_technology->name = $item;
            $new_technology->slug = Str::slug($new_technology->name, '-');
            $new_technology->save();
        }
    }
}
