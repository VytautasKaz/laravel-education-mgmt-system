@extends('layouts.app')
@section('content')
    <div class="card-body container">
        @if (session('status_success'))
            <p style="color: green"><b>{{ session('status_success') }}</b></p>
        @else
            <p style="color: red"><b>{{ session('status_error') }}</b></p>
        @endif
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            @foreach ($lectures as $lecture)
                <tr>
                    <td>{{ $lecture->name }}</td>
                    <td>{{ $lecture->description }}</td>
                    <td>
                        <form action="#" method="POST">
                            <a class="btn btn-success" href="#">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('lectures.create') }}" class="btn btn-success">Add</a>
        </div>
    </div>
@endsection
