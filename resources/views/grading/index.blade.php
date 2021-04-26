@extends('layouts.app')
@section('content')
    <div class="card-body container">
        @if (session('status_success'))
            <p style="color: green"><b>{{ session('status_success') }}</b></p>
        @else
            <p style="color: red"><b>{{ session('status_error') }}</b></p>
        @endif

        <div class="card-header">Grade a student:</div>
        <div class="card-body">
            <form action="{{ route('grades.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Lecture:</label>
                    <select name="lecture_id" class="form-control" required>
                        <option value="" selected disabled>Select a lecture</option>
                        @foreach ($lectures as $lecture)
                            <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Student:</label>
                    <select name="student_id" class="form-control" required>
                        <option value="" selected disabled>Select a student</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name . ' ' . $student->surname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Grade:</label>
                    <input type="number" name="grade" class="form-control" required>
                    @error('grade')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button style="margin-top: 20px;" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
