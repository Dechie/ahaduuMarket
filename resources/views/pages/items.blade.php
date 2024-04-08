<x-layout bodyClass="">

    <x-navbars.sidebar activePage="items"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8 col-md-10 col-12 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header pb-0">
                            <h5 class="mb-0">Items</h5>
                        </div>
                        <div class="card-body">
                            @if ($items->isEmpty())
                                <p>No items found.</p>
                            @else
                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                    @foreach ($items as $item)
                                        <div class="col">
                                            <div class="card">
                                                {{-- @php
                                                    $img = $item->mainImage();
                                                    dump($img);
                                                    $fl = $img->filename;
                                                @endphp --}}
                                                <img src="{{ asset('') }}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $item->title }}</h5>
                                                    <p class="card-text">{{ $item->description }}</p>
                                                    <a href="#" class="btn btn-primary">View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-plugins></x-plugins>

</x-layout>
