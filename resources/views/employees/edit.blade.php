<!-- resources/views/employees/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('employees.form', ['employee' => $employee])
        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>
</div>
@endsection
