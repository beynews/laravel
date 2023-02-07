@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Post {{ $post->id }}</div>
                <div class="card-body">
                    <a href="{{ route('posts.index') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>

                    <table class="table mt-3">
                        <tr>
                            <th>ID</th>
                            <td>{{ $post->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $post->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $post->email }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection