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
    <script type='text/javascript'>
        (function(I, L, T, i, c, k, s) {
            if (I.iticks) return;
            I.iticks = {
                host: c,
                settings: s,
                clientId: k,
                cdn: L,
                queue: []
            };
            var h = T.head || T.documentElement;
            var e = T.createElement(i);
            var l = I.location;
            e.async = true;
            e.src = (L || c) + '/client/inject-v2.min.js';
            h.insertBefore(e, h.firstChild);
            I.iticks.call = function(a, b) {
                I.iticks.queue.push([a, b]);
            };
        })(window, 'https://cdn-v1.intelliticks.com/prod/common', document, 'script', 'https://app.intelliticks.com',
            'Fq5GpY5hddAEYoF2y_c', {});
    </script>
    </section>


</x-mylayouts.layout-default>
