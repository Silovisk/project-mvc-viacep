@extends('app')

@section('content')
    <nav class="navbar bg-primary p-4">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"></span>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="fw-bold fs-1 text-center">Address Registered</h1>
                <div class="d-grid gap-2 col-2 mx-auto">
                    <a class="btn btn-success text-center" href="{{ route('adicionar') }}">
                        Adicionar CEP
                    </a>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Zip</th>
                    <th scope="col">Address</th>
                    <th scope="col">Number</th>
                    <th scope="col">District</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adresses as $address)
                    <tr>
                        <td>{{ $address->id }}</td>
                        <td>{{ $address->zip }}</td>
                        <td>{{ $address->address }}</td>
                        <td>{{ $address->number }}</td>
                        <td>{{ $address->district }}</td>
                        <td>{{ $address->city }}</td>
                        <td>{{ $address->state }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
