<x-mylayouts.layout-default>


    <h1>Store Page</h1>

    <div class="row">



        @foreach ($product_data as $data)
            <div class="col-md-4">
                <img style="width: 200px; height: 200px" src="{{ $data->getImage() }}" alt="image">
                <p>{{ $data->title }}</p>
                <p>${{ $data->getPrice() }}</p>
                <p><a href="{{ $data->getLink() }}">View</a></p>
                <p><a href="{{ route('cart.addfromstorepage', ['id' => $data->id]) }}">Add to cart</a></p>
            </div>
        @endforeach
    </div>


</x-mylayouts.layout-default>
