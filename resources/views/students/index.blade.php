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
                <th>Surname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->surname }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('students.show', $student->id) }}">View Grades</a>
                            <a class="btn btn-success" href="{{ route('students.edit', $student->id) }}">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('students.create') }}" class="btn btn-success">Add</a>
        </div>
    </div>
@endsection
