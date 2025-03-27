<div>
    <x-mylayouts.layout-default>
        <x-mylayouts.inner-layout-admin>




            <!-- /resources/views/post/create.blade.php -->


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
                        <h2>Edit Product</h2>
                    </div>


                    <form action="{{ route('admin.products.update', ['product' => $data->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')




                        <div class="form-group">
                            <label for="title">Product Title:</label>
                            <input type="text" value="{{ $data->title }}" class="form-control" id="title"
                                name="title">
                        </div>

                        <div class="form-group">
                            <label for="short_description">Short Description:</label>
                            <textarea class="form-control" rows="3" id="short_description" name="short_description">{{ $data->short_description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="full_description">Long Description:</label>
                            <textarea class="form-control" rows="5" id="full_description" name="full_description">{{ $data->full_description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" value="{{ $data->price }}" class="form-control" id="price"
                                name="price">
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="text" value="{{ $data->quantity }}" class="form-control" id="quantity"
                                name="quantity">
                        </div>

                        <div class="form-group">
                            <label for="image_path">Image Path:</label>
                            <input type="text" value="{{ $data->image_path }}" class="form-control" id="image_path"
                                name="image_path">
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="text" value="{{ $data->image }}" class="form-control" id="image"
                                name="image">
                            <input type="file" class="form-control" id="image_upload" name="image_upload">

                            <div class="card flex d-flex">
                                <span>Current image:</span>
                                <img style="width: 80px; height:90px" src="{{ $data->getImage() }}" alt="image">
                                <span>New image uploaded:</span>
                                {{-- <img id="image_upload_preview" style="width: 80px; height:90px" src="#" alt="image">
                                --}}

                                <img id="preview-image-before-upload"
                                    src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                    alt="preview image" style="display: none;">





                            </div>
                        </div>


                        <div class="form-group">
                            <label for="category">Category:</label>
                            <input type="text" value="{{ $data->category }}" class="form-control" id="category"
                                name="category">
                        </div>

                        <div class="form-group">
                            <label for="classification">Classification:</label>
                            <select class="form-control" id="classification" name="classification">
                                <option value="{{ $data->classification }}">{{ Str::ucfirst($data->classification) }}
                                </option>
                                <option value="exclusive">Exlusive</option>
                                <option value="featured">Featured</option>
                                <option value="upcoming">Upcoming</option>
                                <option value="none">None</option>


                            </select>
                        </div>



                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" id="status" name="status">

                                @if ($data->status == 'active')
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                @else
                                    <option value="inactive">Inactive</option>
                                    <option value="active">Active</option>
                                @endif
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
