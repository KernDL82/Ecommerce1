<div>
    <x-mylayouts.layout-admin-default>
        <x-mylayouts.inner-layout-admin>



            <div class="card">
                <div class="card-body">

                    <div class="card-title">
                        <h2>View Products</h2>
                    </div>

                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('admin.products.create') }}"><i
                            class="fa-solid fa-plus"></i> Add new product</a>
                    <hr>
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php($count = 1)
                                @foreach ($product_data as $data)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td><img style="width: 70px; height: 80px" src="{{ $data->getImage() }}"
                                                alt="image">
                                        </td>
                                        <td>{{ $data->title }}</td>
                                        <td>${{ $data->price }}</td>
                                        <td>




                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('shop.details', ['id' => $data->id]) }}"
                                                target="_blank"><i class="fa-regular fa-eye"></i></a>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('admin.products.edit', ['product' => $data->id]) }}">
                                                <i class="fa-regular fa-pen-to-square"></i></a>
                                            <a class="btn btn-danger btn-sm" href="#"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                    @php($count++)
                                @endforeach





                            </tbody>
                        </table>
                    </div>

                </div>
                {{-- End Card Body --}}
            </div>
            {{-- End Card --}}



            </x-mylayouts.layout-default>
        </x-mylayouts.inner-layout-admin>
</div>
