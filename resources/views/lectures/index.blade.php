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
                @if (auth()->check())
                    <th>Actions</th>
                @endif
            </tr>
            @foreach ($lectures as $lecture)
                <tr>
                    <td>{{ $lecture->name }}</td>
                    <td>{{ $lecture->description }}</td>
                    @if (auth()->check())
                        <td>
                            <form action="{{ route('lectures.destroy', $lecture->id) }}" method="POST">
                                <a class="btn btn-success" href="{{ route('lectures.edit', $lecture->id) }}">Edit</a>
                                @csrf @method('delete')
                                <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                    value="Delete" />
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
        @if (auth()->check())
            <div>
                <a href="{{ route('lectures.create') }}" class="btn btn-success">Add</a>
            </div>
        @endif
    </div>
@endsection
