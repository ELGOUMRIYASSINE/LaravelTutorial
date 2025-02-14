@extends('layouts.app')

@section('title','Create Post')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
        <div class="mb-3" >
            <label  class="form-label">Title</label>
            <input type="text"  class="form-control" name="title" value={{old('title')}} >
        </div>

        <div class="mb-3" >
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control"  name="description" rows="3">{{old('description')}}</textarea>
        </div>


        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Post Creator</label>
            <select class="form-select" aria-label="Default select example" name="post_creator">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>


        <button class="btn btn-success" >Submit </button>





</form>



@endsection
