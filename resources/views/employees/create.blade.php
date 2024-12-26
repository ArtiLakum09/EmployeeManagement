<!-- resources/views/employees/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('employees.form')
        <button type="submit" class="btn btn-success">Add Employee</button>
    </form>
</div>
@endsection
