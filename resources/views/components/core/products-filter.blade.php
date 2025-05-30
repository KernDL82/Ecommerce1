{{-- Start Reviews Filters --}}
<div class="container my-0 mb-3">
    <div class="card">
        <div class="card-body">
            <form action="" method="GET">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sort">Sort By:</label>
                            <select class="form-control" id="sort" name="sort">
                                <option>All</option>
                                <option value="title_asc">Title (A-Z)</option>
                                <option value="price_asc">Price - Low to High</option>
                                <option value="price_desc">Price - High to Low</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="max_price">Prices (Lower Than):</label>
                            <select class="form-control" id="max_price" name="lower_than">
                                <option value="0">All</option>
                                <option value="50">Lower Than 50</option>
                                <option value="100">Lower Than 100</option>
                                <option value="150">Lower Than 150</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="rating">Prices (Greater Than):</label>
                            <select class="form-control" id="rating" name="greater_than">
                                <option value="0">All</option>
                                <option value="10">Greater Than 10</option>
                                <option value="50">Greater Than 50</option>
                                <option value="150">Greater Than 150</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button class="btn btn-success">Apply</button>
                            <a href="{{ route('store.index') }}" class="btn btn-danger">Clear</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
{{-- End Reviews Filters --}}
