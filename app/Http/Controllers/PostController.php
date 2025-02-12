<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index(){
        $posts = Post::all();
        // dd($posts);
        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post){ // type hinting ==> yow method show this parameters it is for a post model get the post with this is



        // get the post by the id
        // dima fach tkone ghadi tjib element 1 b id dir find
        // $post = Post::find($postId); // model object
        // $post = Post::findOrFail($postId); // ==> had find or fail ila mal9atch item katreja3 exeption dyal not found

        // had tari9a tanya kaymken lik tewal fiha ya3ni dir order by ou wach takhod awel wa7d wla akhire wa7d wla limit  ...

        // $post = Post::where('id',$postId)->first(); // model object or single object => get the first element
        // $post = Post::where('id',$postId)->get(); // collection object => select * from posts

        // dd(
        //     Post::where('title','php')->get()
        // );

        // dd($post);

        // if (is_null($post)) { // hada 7all ila mal9ach dak item kirja3 index page
        //     return to_route('posts.index');
        // }


        return view('posts.show',['post'=>$post]); // posts.show = posts/show
    }

    public function create(){
        // get all values of the post_creator column from all records in the database insetd of get all the records for just the column post_creator
        // $Users = User::pluck('name');

        $users = User::all();

        return view('posts.create',['users' => $users]);
    }

    public function store(){


        // way 1
        // Post::insert(
        //     [
        //         'title' => request()->title,
        //         'description' => request()->description,
        //         'post_creator' => request()->post_creator,
        //     ]
        // );


        // way 2
        // $post = new Post ;

        // $post->title = request()->title;
        // $post->description = request()->description;
        // $post->post_creator = request()->post_creator;

        // $post->save();

        // way 2 ==> hadi bach tkhdem lik khassk temchi l port model ou tzid fillable wt7at fih propeties
        Post::create([
            'title' => request()->title,
            'description' => request()->description,
            'post_creator' => User::find(request()->post_creator)?->name,
            'user_id' => request()->post_creator,
        ]
        );

        return to_route('posts.index');
    }

    public function edit(Post $post){

        $users = User::all();
        return view('posts.edit',['users'=>$users,'post'=>$post]);
    }

    public function update(Post $post){

        // way 1 :

        // $post->title = request()->title;
        // $post->description = request()->description;
        // $post->post_creator = request()->post_creator;

        // $post->save();

        // way 2

        $title = request()->title ;
        $description = request()->description ;
        $post_creator = request()->post_creator ;

        $post->update([
            'title' => $title ,
            'description' => $description ,
            'post_creator' => User::find($post_creator)?->name,
            'user_id' => $post_creator,
        ]
        );


        // dd($title,$description,$postCreator);

        return to_route('posts.show',$post->id);
    }

    public function destroy(Post $post){

        // bach tkhadem hadi ly fihom $postid khassk dirha f parameters ou 7ayd Post

        // $post = Post::find($postid)->delete(); // tari9a 1

        // $delete = Post::where('id', '=', $postid)->delete(); // tari9a 2

        // $delete = DB::table('posts')->where('id','=',$postid)->delete(); // tari9a 3

        $post->delete();

        return to_route('posts.index');
    }
}
