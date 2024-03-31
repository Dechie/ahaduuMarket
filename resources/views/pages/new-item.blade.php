<x-layout bodyClass="">

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="card z-index-0 fadeIn3 fadeInBottom mx-auto">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Create New Item</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('create-item') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows="3" required></textarea>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" required>
                            </div>
                            {{-- <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Main Image</label>
                                <input type="file" class="form-control" name="main-image" accept="image/*" required>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Additional Images</label>
                                <input type="file" class="form-control" name="additional_images[]" accept="image/*"
                                    multiple>
                                <div id="additional_images_preview" class="mt-2"></div>
                            </div> --}}
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Main Image</label>
                                <input type="file" class="form-control" name="main_image" accept="image/*" required>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Additional Images</label>
                                <input type="file" class="form-control" name="additional_images[]" accept="image/*"
                                    multiple id="additional_images">
                                <div id="additional_images_preview" class="mt-2"></div>
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @dump($errors->all())

    <script>
        document.getElementById('additional_images').addEventListener('change', function (e) {
            const previewContainer = document.getElementById('additional_images_preview');
            previewContainer.innerHTML = '';
            const files = e.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-thumbnail';
                    previewContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

</x-layout>