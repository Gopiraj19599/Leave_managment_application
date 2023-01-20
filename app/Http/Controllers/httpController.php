<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class httpController extends Controller
{
    //
    public function getAllData()
    {
        echo "<pre>";
        $responce = Http::get('https://jsonplaceholder.typicode.com/posts');

        return $responce;
    }


    public function getOne_Data($id){
        echo "<pre>";
        $post = Http::get('https://jsonplaceholder.typicode.com/posts/'.$id);

        return $post;

    }

    public function update_post(){
        echo "<pre>";
        $post = Http::post('https://jsonplaceholder.typicode.com/posts',[
             "userId"=> 3,
            //  "id" => 23,
             "title" => "Gopiraj is developer ",
             "body"=> "Gopiraj In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available"
        ]);

        return $post;

    }

}
