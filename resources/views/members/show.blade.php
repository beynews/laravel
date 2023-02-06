@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Members {{ $member->id }}</div>
                <div class="card-body">
                    <a href="{{ route('members.index') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                    <a href="{{ route('members.edit', $member) }}" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('members.destroy', $member) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>

                    <table class="table mt-3">
                        <tr>
                            <th>ID</th>
                            <td>{{ $member->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $member->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $member->email }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection