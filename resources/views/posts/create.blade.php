@extends('layouts.app')

@section('title','Create Post')
@section('content')
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
        <div class="mb-3" >
            <label  class="form-label">Title</label>
            <input type="text" class="form-control" name="title" >
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>


        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Post Creator</label>
            <select class="form-select" aria-label="Default select example" name="post_creator">
                <option selected>Open this select menu</option>
                <option value="yassine">Yassine</option>
                <option value="zouhaire">Zouhaire</option>
            </select>
        </div>


        <button class="btn btn-success" >Submit </button>





</form>



@endsection
