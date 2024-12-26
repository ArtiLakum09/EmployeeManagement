@extends('layouts.app')

@section('title', 'Employee Details')

@section('content')
    <h1>Employee Details</h1>

    <div class="card">
        <div class="card-header">
            <h3>{{ $employee->first_name }} {{ $employee->last_name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Mobile:</strong> {{ $employee->country_code }}{{ $employee->mobile }}</p>
            <p><strong>Gender:</strong> {{ ucfirst($employee->gender) }}</p>
            <p><strong>Address:</strong> {{ $employee->address }}</p>

            <p><strong>Hobbies:</strong> 
                @foreach(json_decode($employee->hobbies) as $hobby)
                    {{ ucfirst($hobby) }}{{ !$loop->last ? ',' : '' }}
                @endforeach
            </p>

            @if($employee->photo_path)  <!-- Check if the photo exists -->
                <p><strong>Photo:</strong></p>
                <img src="{{ asset('storage/' . $employee->photo_path) }}" alt="{{ $employee->first_name }}'s photo" class="img-fluid" width="200">
            @else
                <p><strong>No photo available</strong></p>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to Employee List</a>
        </div>
    </div>

@endsection
