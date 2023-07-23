@extends('app')

@section('content')
    <nav class="navbar bg-primary p-4">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"></span>
        </div>
    </nav>
    <div class="container d-flex justify-content-center items-align-center">
        <form action="{{ route('searchZip') }}" method="GET" class="bg-dark-subtle p-4 mt-5">
            <h1 class="fw-bold text-center py-2 ">Forms</h1>
            <div class="mb-3">
                <label for="InputZip" class="form-label">Zip</label>
                <input type="text" aria-label="Zip" class="form-control" id="InputZip" name="InputZip"
                    data-bs-theme="dark">
            </div>
            <div class="btn-group d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-success ">Submit</button>
                <button type="button" class="btn btn-outline-danger">Close</button>
            </div>
        </form>
    </div>
@endsection
