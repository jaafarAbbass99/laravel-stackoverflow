<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TagSeeder extends Seeder
{
    
    public function run(): void
    {
        $tags = [
            [
                'name' => 'php',
                'description' => 'PHP programming language and related topics'
            ],
            [
                'name' => 'laravel',
                'description' => 'Laravel framework best practices and techniques'
            ],
            [
                'name' => 'javascript',
                'description' => 'JavaScript general programming and frontend usage'
            ],
            [
                'name' => 'mysql',
                'description' => 'MySQL database queries, optimization, and schema design'
            ],
            [
                'name' => 'html',
                'description' => 'HTML markup structure and web interface building'
            ],
            [
                'name' => 'css',
                'description' => 'CSS styling and responsive layouts'
            ],
            [
                'name' => 'vuejs',
                'description' => 'Vue.js front-end framework and components'
            ],
            [
                'name' => 'react',
                'description' => 'React library and component development'
            ],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
