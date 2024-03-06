@extends('layout.app');

@section('content');
    
        <div class="container">
            <!-- Your Navbar content here -->
            <span>{{ $apiName }}</span> <!-- Display the variable in the navbar -->
        </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="form-inline" action="{{ route('search', ['apiName' => $apiName]) }}" method="POST">
                    @csrf
                    <div class="input-group w-100">
                        <input type="text" name="searchQuery" class="form-control form-control-lg" placeholder="Search on {{$apiName}}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i> <!-- Font Awesome search icon -->
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


    

