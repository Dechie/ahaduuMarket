@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($searchResults as $result)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $result->image }}" class="card-img-top" alt="{{ $result->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $result->title }}</h5>
                    <!-- You can add more data from your search results here -->
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
