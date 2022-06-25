<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rss;
use App\Models\News;

class NewsController extends Controller
{
    public function aggregate($id_rss){
        $rss = Rss::findOrFail($id_rss);
        
        $xml = file_get_contents($rss->url);
        $xmlObj = simplexml_load_string($xml);
        print_r($xmlObj);

        foreach ($xmlObj->channel->item as $xml){
            $title= $xml->title;
            $desc= $xml->description;
            $data= array(
                'title' => $title,
                'img_url' => $xml->enclosure['url'],
                'description' => $desc,
                'source_url' => $xml->link,
                'rss_id' => $id_rss
            );
            News::Create($data);
            //dd($data);

            $news = News::where('rss_id', $id_rss)->get();
            foreach($news as $n){
                print_r($n->title ."<br>".$n->description);
                print_r("<br>");
            }
        }
    }
}
