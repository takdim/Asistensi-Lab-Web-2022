<?php

namespace App\Models;

class Post{
    private static $blog_posts = [
        [
            "title" => "Judul 1",
            "slug" => "judul-1",
            "author" => "Eka Hanny",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia ipsam corrupti consequuntur odit, 
            et aliquam modi in recusandae accusamus sed distinctio laudantium nulla eveniet maiores sapiente officia temporibus.
            Asperiores unde eligendi in, omnis ex provident sunt quae totam quos pariatur eveniet excepturi hic nesciunt fugit 
            corrupti et exercitationem ullam at aliquid labore quibusdam eaque ratione quasi. Reprehenderit sunt, 
            provident cumque voluptatibus ipsam placeat dignissimos reiciendis nemo natus ratione eaque tempora architecto voluptates 
            corrupti quas? Laudantium hic itaque tempore quidem id animi eius tenetur molestiae, nesciunt enim.",
        ],
    
        [
            "title" => "Judul 2",
            "slug" => "judul-2",
            "author" => "Ekuy",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis recusandae sed excepturi laudantium accusamus, 
            corrupti fugiat obcaecati non mollitia labore magnam adipisci officiis nam quibusdam suscipit minus nobis eveniet unde quam et 
            tempore. Dolorem quos, possimus beatae a nisi, aspernatur odit distinctio impedit dolores fuga ad id, quidem deleniti porro illum alias.
            Provident impedit aspernatur deserunt animi voluptate. Libero est quo tenetur molestias explicabo totam rem, 
            cupiditate minima quia labore impedit necessitatibus natus praesentium, possimus beatae magnam doloribus enim. 
            Voluptates incidunt quos minima numquam libero at hic laudantium, voluptatibus nobis adipisci quia est rem veniam! 
            Ipsa vitae libero labore non..",
        ],
    
    ];  

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}