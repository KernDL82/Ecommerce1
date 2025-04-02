<div>
    <x-mylayouts.layout-admin-default>
        <x-mylayouts.inner-layout-admin>





            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Create Post Form -->

            {{-- Start Card --}}
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>Add Product</h2>
                    </div>

                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="title">Product Title:</label>
                            <input type="text" value="" class="form-control" id="title" name="title"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="short_description">Short Description:</label>
                            <textarea class="form-control" rows="3" id="short_description" name="short_description" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="full_description">Full Description:</label>
                            <textarea class="form-control" rows="5" id="full_description" name="full_description" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" value="" class="form-control" id="price" name="price"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="text" value="" class="form-control" id="quantity" name="quantity"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="image_path">Image Path:</label>
                            <input type="text" value="images/products/" class="form-control" id="image_path"
                                name="image_path" required disabled>
                        </div>


                        <div class="form-group">
                            <label for="image">Image:</label>
                            {{-- <input type="text" value="" class="form-control" id="image" name="image"> --}}
                            <input type="file" class="form-control" id="image_upload" name="image_upload" required>

                            {{-- <div class="card flex d-flex">
                                <img id="preview-image-before-upload"
                                    src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" alt="preview image"
                                    style="display: none;">
                            </div> --}}
                        </div>


                        {{-- <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled=""
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div> --}}


                        <div class="form-group">
                            <label for="category">Category:</label>
                            <input type="text" value="" class="form-control" id="category" name="category"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="classification">Classification:</label>
                            <select class="form-control" id="classification" name="classification" required>


                                <option value="default">Default</option>
                                <option value="exclusive">Exlusive</option>
                                <option value="featured">Featured</option>
                                <option value="upcoming">Upcoming</option>


                            </select>
                        </div>



                        <div class="form-group">
                            <label for="status">Is active:</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a class="btn btn-danger" href="{{ route('admin.products.index') }}">Cancel</a>
                        </div>

                    </form>

                </div>
                {{-- End Card Body --}}
            </div>
            {{-- End Card --}}

            </x-mylayouts.layout-default>
        </x-mylayouts.inner-layout-admin>
</div>
