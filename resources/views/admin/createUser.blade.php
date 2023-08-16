@extends('layouts.app')

@section('content')
    <div class="container">
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="username" class="form-control" id="username" required>
                {{-- <div id="username" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" required>Role</label>
                <div class="form-check">
                    &nbsp; 
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="adminRole" required>
                    <label class="form-check-label" for="adminRole">
                        Admin
                    </label>
                    <br>
                    &nbsp; 
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="marketingRole">
                    <label class="form-check-label" for="marketingRole">
                        Marketing
                    </label>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
            {{-- <a href="{{ route('user.index') }}" formnovalidate> --}}
                <button type="submit" formaction="{{ route('user.index') }}" class="btn btn-secondary" formnovalidate>Cancel</button>
            {{-- </a> --}}
        </form>
    </div>
@endsection
