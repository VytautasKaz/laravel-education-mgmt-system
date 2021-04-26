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
                        <form style="float:left;" action="" method="GET">
                            <input type="hidden" name="current_grade" value="{{ $grade->grade }}">
                            <input type="hidden" name="current_id" value="{{ $grade->id }}">
                            <button class="btn btn-success" name="edit_grade" type="submit">Edit</button>
                        </form>
                        <form style="float:left; margin-left: 10px;" action="{{ route('grades.destroy', $grade->id) }}"
                            method="POST">
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        @isset($_GET['edit_grade'])
            <div class="card">
                <div class="card-header">Edit grade:</div>
                <div class="card-body">
                    <form action="{{ route('grades.update', $_GET['current_id']) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="form-group">
                            <input type="number" name="upd_grade" class="form-control" value="{{ $_GET['current_grade'] }}"
                                required>
                            @error('grade')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        @endisset
    </div>
@endsection
