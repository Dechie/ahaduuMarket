@extends('layout.app')

@section('content')
    <header class="text-center text-white d-flex masthead" style="background-image:url('Image/pexels-kindel-media-6868621.jpg');">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h1 class="text-uppercase"><strong><br><strong>YOUR ONE-STOP SHOP for international marketplace</strong><br><br></strong></h1>
                    <hr>
                </div>
            </div>
            <div class="col-lg-8 mx-auto">
                <p class="text-faded mb-5">ከአለም አቀፍ ገበያ በኛ በኩል ይገበያዩ ሚፈልጉትን እቃ ከሚፈልጉት ድህረግጽ ሊንኩን ይላኩልን እኛ ያሉበት እናመጣሎታለን!</p><a class="btn btn-primary btn-xl" role="button" href="{{ route('showShop') }}">shop now</a>
            </div>
        </div>
    </header>
    <section id="about" class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col offset-lg-8 text-center mx-auto">
                    <h2 class="text-white section-heading">ሚፈልጉት ሁሉ ከኛ ጋር አለ!</h2>
                    <hr class="light my-4">
                    <!-- <p class="text-faded mb-4">ከየት እቃ ለማዘዝ አስበዋል? ከ Aliexpress ከshein ወይስ ከebay አያስቡ እኛ ከጭንቀቶ ልንገላግሎ መተናል ከ እርሶ ሚጠበቀው ሚፈልጉትን እቃ ብቻ መርጠው ሊንኩን ዌብሳይታችን ላይ ያስገቡ አጠቃላይ ዋጋውን እና የ እቃውን ሙሉ መረጃ ያመጣሎታል እቃዎም በታሰበው ሰዓት ይደርሳል እንደደረሰም አካውንቶ ላይ ባለው ቁጥር ደውለን ያሉበት እናመጣሎታለን!! <br><br>አሐዱ ገበያ</p><a class="btn btn-light btn-xl" role="button">Signup/LOGIN!</a> -->
                </div>
            </div>
        </div>
    </section>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Our Service</h2>
                    <hr class="my-4">
                </div>
            </div>
        </div>
    </section>
    <section id="portfolio" class="p-0">
        <div class="container-fluid p-0">
            <div class="row g-0 popup-gallery">
                <div class="col-sm-6 col-lg-4"><a class="portfolio-box" href="{{ asset('/img/fullsize/1.jpg') }}"><img class="img-fluid" src="Image/electronics.jpg">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded"><span>Ebay</span></div>
                                <div class="project-name"><span>Electronics</span></div>
                            </div>
                        </div>
                    </a></div>
                <div class="col-sm-6 col-lg-4"><a class="portfolio-box" href="assets/img/fullsize/2.jpg"><img class="img-fluid" src="Image/fashion.jpg">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded"><span>Shein</span></div>
                                <div class="project-name"><span>Fashions</span></div>
                            </div>
                        </div>
                    </a></div>
                <div class="col-sm-6 col-lg-4"><a class="portfolio-box" href="assets/img/fullsize/3.jpg"><img class="img-fluid" src="Image/cloth.jpg">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded"><span>Aliexpress</span></div>
                                <div class="project-name"><span>Cloths</span></div>
                            </div>
                        </div>
                    </a></div>
                <div class="col-sm-6 col-lg-4"><a class="portfolio-box" src="{{ asset('/img/fullsize/4.jpg') }}"><img class="img-fluid" src="/img/thumbnails/4.jpg">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded"><span></span></div>
                                <div class="project-name"><span>Project Name</span></div>
                            </div>
                        </div>
                    </a></div>
                <div class="col-sm-6 col-lg-4"><a class="portfolio-box" src="{{ asset('/img/fullsize/5.jpg') }}"><img class="img-fluid" src="/img/thumbnails/5.jpg">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded"><span>Category</span></div>
                                <div class="project-name"><span>Project Name</span></div>
                            </div>
                        </div>
                    </a></div>
                <div class="col-sm-6 col-lg-4"><a class="portfolio-box" src="{{ asset('/img/fullsize/6.jpg') }}"><img class="img-fluid" src="/img/thumbnails/6.jpg">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded"><span>Category</span></div>
                                <div class="project-name"><span>Project Name</span></div>
                            </div>
                        </div>
                    </a></div>
            </div>
        </div>
    </section>
    <section class="text-white bg-dark">
        <div class="container text-center">
            <h2 class="mb-4">Start shopping!</h2><a class="btn btn-light btn-xl sr-button" role="button" data-aos="zoom-in" data-aos-duration="400" data-aos-once="true" href="#">Shop now!</a>
        </div>
    </section>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-center mx-auto">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="my-4">
                    <p class="mb-5">Contact us using the following</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 text-center ms-auto"><i class="fa fa-phone fa-3x mb-3 sr-contact" data-aos="zoom-in" data-aos-duration="300" data-aos-once="true"></i>
                    <p>0940405038</p>
                </div>
                <div class="col-lg-4 text-center me-auto"><i class="fa fa-telegram fa-3x mb-3 sr-contact" data-aos="zoom-in" data-aos-duration="300" data-aos-delay="300" data-aos-once="true"></i>
                    <p><a href="mailto:your-email@your-domain.com">@ahaduumarket</a></p>
                </div>
            </div>
        </div>
    </section>

@endsection