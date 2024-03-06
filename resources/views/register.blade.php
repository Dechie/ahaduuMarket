@extends('layout.app')

@section('content')

<section class="text-center text-white d-flex masthead" style="background-image: url('Image/fam.jpg');padding-top: 241px;padding-bottom: 140px;margin-top: -154px;margin-bottom: -182px;"><div id="main-wrapper" class="container">
    <script> console.log('register page') </script>
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Register</h3>
                                </div>
                                <p class="text-muted mt-2 mb-5">BE PART OF OUR E-COMMERCE COMPANY BY REGISTERING</p>
                                <form id="registrationForm" action= "{{ route('register') }}" method="POST" ">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Your Full name</label>
                                        <input type="text" class="form-control" id="name"  name="name"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone number</label>
                                        <input type="text" class="form-control" id="phone" name="phone"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email"/>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"/>
                                    </div> 
                                    <button type="submit" value="Submit" class="btn btn-theme" >Register</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">Enjoy exclusive deals and offers tailored just for you.</h4>
                                    <p class="lead text-white">"Access a vast array of products from international sellers"</p>
                                    <p>- AHADU MARKET</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
            <p class="text-muted text-center mt-3 mb-0">Already have an account? <a href="{{ route('loginPage') }}" class="text-primary ml-1">login</a></p>
            <!-- end row -->
        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div>
</section>

@endsection