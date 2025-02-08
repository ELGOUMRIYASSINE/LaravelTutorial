<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $allPosts = [
        ['id' => 1, 'title' => 'Laravel Basics', 'posted_by' => 'John Doe', 'created_at' => '2023-01-01', 'description' => 'Introduction to Laravel framework basics.'],
        ['id' => 2, 'title' => 'Advanced Laravel', 'posted_by' => 'Jane Smith', 'created_at' => '2023-02-15', 'description' => 'Deep dive into advanced Laravel features.'],
        ['id' => 3, 'title' => 'Laravel Eloquent', 'posted_by' => 'Alice Johnson', 'created_at' => '2023-03-10', 'description' => 'Comprehensive guide to Laravel Eloquent ORM.'],
        ['id' => 4, 'title' => 'Laravel Blade', 'posted_by' => 'Bob Brown', 'created_at' => '2023-04-05', 'description' => 'Understanding Laravel Blade templating engine.'],
        ['id' => 5, 'title' => 'Laravel Testing', 'posted_by' => 'Charlie Davis', 'created_at' => '2023-05-20', 'description' => 'Best practices for testing in Laravel.']
    ];

    public function index(){
        return view('posts.index', ['posts' => $this->allPosts]);
    }

    public function show($postId){
        return view('posts.show'); // posts.show = posts/show
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        return to_route('posts.index');
    }

    public function edit(){

        return view('posts.edit');
    }

    public function update(){

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        // dd($title,$description,$postCreator);

        return to_route('posts.show',1);
    }

    public function destroy(){

        return to_route('posts.index');
    }
}
