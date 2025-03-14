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
                    <p>${{ $data->price }}</p>
                    <p>${{ app('CustomHelper')->formatPrice($data->getCartQuantityPrice()) }}</p>

                    <p><a href="{{ route('shop.details', ['id' => $data->id]) }}">View</a></p>

                    <input type="text" name="quantity" value="{{ $data->pivot->quantity }}">

                    <form action="{{ route('cart.destroy', ['id' => $data->pivot->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Remove</button>

                    </form>



                </div>
            @endforeach



        </div>

        <p>Cart Subtotal: ${{ app('CustomHelper')->formatPrice($cart_data->getSubtotal()) }}</p>
        <p>Cart Total: ${{ $cart_data->getTotal() }}</p>


        <br>
        <br>
        <br>
        <br>
        <br>


    @endif
</x-mylayouts.layout-default>
