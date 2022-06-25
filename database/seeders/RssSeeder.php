<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rss;

class RssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rss::create([
            //'name' => 'KBS Domestic News',
            //'url' => "http://world.kbs.co.kr/rss/rss_news.htm?lang=e&id=Dm"
            //'name' => 'SUARA',
            //'url' => "https://www.suara.com/rss/bola"
            'name' => 'Berita Terbaru MILITER',
            'url' => "https://beritaterbaru.co.id/rss/category-id/17"
        ]);
    }
}
