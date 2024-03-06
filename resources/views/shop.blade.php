@extends('layout.app')

@section('content')
   <div class="container my-auto mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" style="width: 18rem; background-color: #f9f8fa">
                <img class="card-img-top" src="{{ asset('/img/fullsize/3.jpg') }}" alt="Card Image ">
                <div class="card-body">
                    <h5 class="card-title">Ali Express</h5>
                     <p class="card-text">This is For ali express api</p>
                    <a href="{{route('showSearch', ['apiName' => 'Ali Express'])}}" class="btn btn-primary">Browse</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem; background-color: #f9f8fa">
                <img class="card-img-top" src="{{ asset('/img/fullsize/3.jpg') }}" alt="Card Image ">
                <div class="card-body">
                    <h5 class="card-title">Amazon</h5>
                    <p class="card-text">This is For amazon api</p>
                    <a href="{{route('showSearch', ['apiName' => 'Amazon'])}}" class="btn btn-primary">Browse</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem; background-color: #f9f8fa">
                <img class="card-img-top" src="{{ asset('/img/fullsize/3.jpg') }}" alt="Card Image ">
                <div class="card-body">
                    <h5 class="card-title">Alibaba</h5>
                    <p class="card-text">This is For alibaba api</p>
                    <a href="{{route('showSearch', ['apiName' => 'Alibaba'])}}" class="btn btn-primary">Browse</a>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection