<!-- resources/views/employees/form.blade.php -->
<div class="form-group">
    <label>First Name</label>
    <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $employee->first_name ?? '') }}" required>
</div>
<div class="form-group">
    <label>Last Name</label>
    <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $employee->last_name ?? '') }}" required>
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email ?? '') }}" required>
</div>

<div class="form-group">
    <label>Country Code</label>
    <select name="country_code" class="form-control" required>
        <option value="" disabled {{ old('country_code', $employee->country_code ?? '') == '' ? 'selected' : '' }}>Select Country Code</option>
        <option value="+1" {{ old('country_code', $employee->country_code ?? '') == '+1' ? 'selected' : '' }}>United States (+1)</option>
        <option value="+44" {{ old('country_code', $employee->country_code ?? '') == '+44' ? 'selected' : '' }}>United Kingdom (+44)</option>
        <option value="+91" {{ old('country_code', $employee->country_code ?? '') == '+91' ? 'selected' : '' }}>India (+91)</option>
        <option value="+61" {{ old('country_code', $employee->country_code ?? '') == '+61' ? 'selected' : '' }}>Australia (+61)</option>
        <option value="+81" {{ old('country_code', $employee->country_code ?? '') == '+81' ? 'selected' : '' }}>Japan (+81)</option>
        <option value="+49" {{ old('country_code', $employee->country_code ?? '') == '+49' ? 'selected' : '' }}>Germany (+49)</option>
        <option value="+33" {{ old('country_code', $employee->country_code ?? '') == '+33' ? 'selected' : '' }}>France (+33)</option>
        <option value="+86" {{ old('country_code', $employee->country_code ?? '') == '+86' ? 'selected' : '' }}>China (+86)</option>
        <!-- Add more country codes as needed -->
    </select>
</div>
<div class="form-group">
    <label>Mobile</label>
    <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $employee->mobile ?? '') }}" required>
</div>

<div class="form-group">
    <label>Address</label>
    <textarea name="address" class="form-control" required>{{ old('address', $employee->address ?? '') }}</textarea>
</div>
<div class="form-group">
    <label>Gender</label>
    <select name="gender" class="form-control" required>
        <option value="Male" {{ old('gender', $employee->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ old('gender', $employee->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
    </select>
</div>
<div class="form-group">
    <label>Hobbies</label>
    <div>
        <label>
            <input type="checkbox" name="hobby[]" value="Reading" 
                {{ is_array(old('hobby', $employee->hobby ? explode(',', $employee->hobby) : [])) && in_array('Reading', old('hobby', $employee->hobby ? explode(',', $employee->hobby) : [])) ? 'checked' : '' }}>
            Reading
        </label>
    </div>
    <div>
        <label>
            <input type="checkbox" name="hobby[]" value="Traveling" 
                {{ is_array(old('hobby', $employee->hobby ? explode(',', $employee->hobby) : [])) && in_array('Traveling', old('hobby', $employee->hobby ? explode(',', $employee->hobby) : [])) ? 'checked' : '' }}>
            Traveling
        </label>
    </div>
    <div>
        <label>
            <input type="checkbox" name="hobby[]" value="Cooking" 
                {{ is_array(old('hobby', $employee->hobby ? explode(',', $employee->hobby) : [])) && in_array('Cooking', old('hobby', $employee->hobby ? explode(',', $employee->hobby) : [])) ? 'checked' : '' }}>
            Cooking
        </label>
    </div>
    <div>
        <label>
            <input type="checkbox" name="hobby[]" value="Sports" 
                {{ is_array(old('hobby', $employee->hobby ? explode(',', $employee->hobby) : [])) && in_array('Sports', old('hobby', $employee->hobby ? explode(',', $employee->hobby) : [])) ? 'checked' : '' }}>
            Sports
        </label>
    </div>
    <div>
        <label>
            <input type="checkbox" name="hobby[]" value="Music" 
                {{ is_array(old('hobby', $employee->hobby ? explode(',', $employee->hobby) : [])) && in_array('Music', old('hobby', $employee->hobby ? explode(',', $employee->hobby) : [])) ? 'checked' : '' }}>
            Music
        </label>
    </div>
    <div>
        <label>
            <input type="checkbox" name="hobby[]" value="Gardening" 
                {{ is_array(old('hobby', $employee->hobby ? explode(',', $employee->hobby) : [])) && in_array('Gardening', old('hobby', $employee->hobby ? explode(',', $employee->hobby) : [])) ? 'checked' : '' }}>
            Gardening
        </label>
    </div>
    <div>
        <label>
            <input type="checkbox" name="hobby[]" value="Photography" 
                {{ is_array(old('hobby', $employee->hobby ? explode(',', $employee->hobby) : [])) && in_array('Photography', old('hobby', $employee->hobby ? explode(',', $employee->hobby) : [])) ? 'checked' : '' }}>
            Photography
        </label>
    </div>
</div>

<div class="form-group">
    <label>Photo</label>
    <input type="file" name="photo" class="form-control">
    @if(!empty($employee->photo))
        <img src="{{ asset('storage/' . $employee->photo) }}" alt="Employee Photo" width="100" class="mt-2">
    @endif
</div>
