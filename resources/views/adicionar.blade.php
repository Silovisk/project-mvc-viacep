@extends('app')

@section('content')

    <nav class="navbar bg-primary p-4">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"></span>
        </div>
    </nav>
    <div class="container d-flex justify-content-center items-align-center">
        <form action="{{ route('salvar') }}" method="POST" class="bg-dark-subtle p-4 mt-5">
            @csrf
            <h1 class="fw-bold text-center py-2 ">Forms</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3">
                <label for="InputZip" class="form-label">Zip</label>
                <input type="text" aria-label="Zip" class="form-control" id="InputZip" name="InputZip"
                    data-bs-theme="dark" value="{{ $zip }}">
            </div>
            <div class="mb-3">
                <label for="InputAddress" class="form-label">Address</label>
                <input type="text" aria-label="Address" class="form-control" id="InputAddress" name="InputAddress"
                    data-bs-theme="dark" readonly value="{{ $address }}">
            </div>
            <div class="row">
                <div class="col-8 mb-3">
                    <label for="InputDistrict" class="form-label">District</label>
                    <input type="text" aria-label="District" class="form-control" id="InputDistrict"
                        name="InputDistrict" data-bs-theme="dark" readonly value="{{ $district }}">
                </div>
                <div class="col-4 mb-3">
                    <label for="InputNumber" class="form-label">Number</label>
                    <input type="text" aria-label="Number" class="form-control" id="InputNumber" name="InputNumber"
                        data-bs-theme="dark">
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="InputCity" class="form-label">City</label>
                    <input type="text" aria-label="City" class="form-control" id="InputCity" name="InputCity"
                        data-bs-theme="dark" readonly value="{{ $city }}">
                </div>
                <div class="col-6 mb-3">
                    <label for="InputState" class="form-label">State</label>
                    <input type="text" aria-label="State" class="form-control" id="InputState" name="InputState"
                        data-bs-theme="dark" readonly value="{{ $state }}">
                </div>
            </div>
            <div class="btn-group d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-success ">Submit</button>
                <button type="submit" class="btn btn-outline-danger">Close</button>
            </div>
        </form>
    </div>
@endsection
