<x-mylayouts.layout-default>



    @if ($cart_data->isEmpty())

        <x-core.cart-empty />
    @else
        <h1>Cart Page</h1>

        <div class="row">

            @foreach ($cart_data as $data)
                <div class="col-md-4">
                    <img style="width: 200px; height: 200px" src="{{ $data->getImage() }}" alt="image">
                    <p>{{ $data->title }}</p>
                    <p>${{ $data->price }} per product</p>
                    <p>${{ $data->getCartQuantityPrice() }} per quantity</p>
                    <input type="number" name="quantity" value="{{ $data->pivot->quantity }}">
                    <p><a href="{{ $data->getLink() }}">View</a></p>


                    <form action="{{ route('cart.destroy', ['id' => $data->pivot->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Remove</button>
                    </form>



                </div>
            @endforeach

        </div>
    @endif

</x-mylayouts.layout-default>
