@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee Details</h1>
    
    <div class="card mb-3">
        <div class="card-header">
            <h3>{{ $employee->first_name }} {{ $employee->last_name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Mobile:</strong> {{ $employee->country_code }} {{ $employee->mobile }}</p>
            <p><strong>Address:</strong> {{ $employee->address }}</p>
            <p><strong>Gender:</strong> {{ $employee->gender }}</p>
            <p><strong>Hobbies:</strong> {{ $employee->hobby ? implode(', ', explode(',', $employee->hobby)) : 'None' }}</p>
            <p>
                <strong>Photo:</strong><br>
                @if($employee->photo)
                    <img src="{{ asset('storage/' . $employee->photo) }}" alt="Employee Photo" width="150">
                @else
                    <span>No photo available</span>
                @endif
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
