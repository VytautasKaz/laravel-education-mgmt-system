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
            @foreach ($grades as $grade)
                <tr>
                    <td>
                        @foreach ($lectures as $lecture)
                            @if ($lecture->id == $grade->lecture_id)
                                {{ __($lecture->name) }}
                            @endif
                        @endforeach
                    </td>
                    <td> {{ $grade->grade }} </td>
                    <td>
                        <form action="" method="POST">
                            <a class="btn btn-success" href="#">Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
