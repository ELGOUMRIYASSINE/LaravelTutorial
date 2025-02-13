
@extends('layouts.app')

@section('title','index')
@section('content')
<div class="text-center m-2" >
    <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
</div>
<table class="table text-center m-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td scope="row">{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->post_creator }}</td>
                {{-- hna created_at hiya mashy property wlkine hiya rah object ou object rah fih bzzf dyal properties or l function ly t9derr dir b7al addDays() ...  --}}
                {{-- laravel fiha wa7d package smito carbo hoya dyal getion dyal timming fih bzzf dyal les function t9der t3ref chno t9der dir bihom kteb carbon  f google w9alb 3liha  --}}
                {{-- <td>{{ $post->created_at->toFormattedDateString() }}</td> --}}
                <td>{{ $post->created_at->addDays(2)->format('Y-m-d') }}</td>
                <td>
                    <a href="{{route('posts.show',$post->id)}}" class="btn btn-info">View</a>
                    <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary">Edit</a>
                    <form style="display:inline;" action="{{ route('posts.delete',$post->id ) }}" method="post" >
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
