@extends('layouts.app')

@section('title', 'Add New Employee')

@section('content')
    <h1>Add New Employee</h1>

    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" required>
            @error('first_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" required>
            @error('last_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

   

        <div class="form-group">
    <label for="country_code">Country Code</label>
    <select name="country_code" id="country_code" class="form-control" required>
        <option value="">Select Country Code</option>
        <option value="+1" {{ old('country_code') == '+1' ? 'selected' : '' }}>+1 (USA, Canada)</option>
        <option value="+44" {{ old('country_code') == '+44' ? 'selected' : '' }}>+44 (UK)</option>
        <option value="+91" {{ old('country_code') == '+91' ? 'selected' : '' }}>+91 (India)</option>
        <option value="+61" {{ old('country_code') == '+61' ? 'selected' : '' }}>+61 (Australia)</option>
        <option value="+81" {{ old('country_code') == '+81' ? 'selected' : '' }}>+81 (Japan)</option>
        <option value="+49" {{ old('country_code') == '+49' ? 'selected' : '' }}>+49 (Germany)</option>
        <option value="+33" {{ old('country_code') == '+33' ? 'selected' : '' }}>+33 (France)</option>
        <option value="+55" {{ old('country_code') == '+55' ? 'selected' : '' }}>+55 (Brazil)</option>
        <!-- Add more country codes as needed -->
    </select>
    @error('country_code')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" name="mobile" id="mobile" class="form-control" value="{{ old('mobile') }}" required>
            @error('mobile')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="address" class="form-control" rows="3" required>{{ old('address') }}</textarea>
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="">Select Gender</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('gender')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="hobbies">Hobbies</label>
            <select name="hobbies[]" id="hobbies" class="form-control" multiple>
                <option value="reading" {{ in_array('reading', old('hobbies', [])) ? 'selected' : '' }}>Reading</option>
                <option value="travelling" {{ in_array('travelling', old('hobbies', [])) ? 'selected' : '' }}>Travelling</option>
                <option value="sports" {{ in_array('sports', old('hobbies', [])) ? 'selected' : '' }}>Sports</option>
                <option value="music" {{ in_array('music', old('hobbies', [])) ? 'selected' : '' }}>Music</option>
                <option value="photography" {{ in_array('photography', old('hobbies', [])) ? 'selected' : '' }}>Photography</option>
            </select>
            @error('hobbies')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
            @error('photo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Save Employee</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
