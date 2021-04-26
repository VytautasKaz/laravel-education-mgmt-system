@extends('layouts.app')
@section('content')
    <div class="card-body container">
        @if (session('status_success'))
            <p style="color: green"><b>{{ session('status_success') }}</b></p>
        @else
            <p style="color: red"><b>{{ session('status_error') }}</b></p>
        @endif
        <h2>{{ $student->surname . ', ' . $student->name }}</h2>
        <table class="table">
            <tr>
                <th>Lecture</th>
                <th>Grade</th>
                <th>Actions</th>
            </tr>
            {{-- @foreach ($lectures as $lecture)
                <tr>
                    <td>{{ $lecture->name }}</td>
                    <td></td>
                    <td>
                        <form action="" method="POST">
                            <a class="btn btn-success" href="#">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach --}}
        </table>
    </div>
@endsection
