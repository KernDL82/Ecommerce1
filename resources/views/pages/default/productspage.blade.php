<x-mylayouts.layout-default>



    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-10 order-md-last">
                    <div class="row">


                        @foreach ($product_data as $data)
                            <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                                <div class="product d-flex flex-column">
                                    <a href="#" class="img-prod"><img class="img-fluid" src="{{ $data->getImage() }}"
                                            alt="Colorlib Template">
                                        <span class="status">50% Off</span>
                                        <div class="overlay"></div>
                                    </a>
                                    <div class="text py-3 pb-4 px-3">
                                        <div class="d-flex">
                                            <div class="cat">
                                                <span>{{ $data->category }}</span>
                                            </div>
                                            <div class="rating">
                                                <p class="text-right mb-0">
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                </p>
                                            </div>
                                        </div>
                                        <h3><a href="{{ $data->getLink() }}">{{ $data->title }}</a></h3>
                                        <div class="pricing">
                                            {{-- <p class="price"><span class="mr-2 price-dc">$120.00</span> --}}
                                            <span class="price-sale">${{ $data->getPrice() }}</span>
                                            </p>
                                        </div>
                                        <p class="bottom-area d-flex px-3">
                                            <a href="{{ route('cart.addfromstorepage', ['id' => $data->id]) }}"
                                                class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
                                                        class="ion-ios-add ml-1"></i></span></a>
                                            <a href="{{ $data->getLink() }}"
                                                class="buy-now text-center py-2">Details<span><i
                                                        class="ion-ios-cart ml-1"></i></span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach






                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2">
                    <div class="sidebar">
                        <div class="sidebar-box-2">
                            <h2 class="heading">Categories</h2>
                            <div class="fancy-collapse-panel">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">Mushroom types
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <ul>
                                                    <li><a href="#">Pink Oyster</a></li>
                                                    <li><a href="#">Blue Oyster</a></li>
                                                    <li><a href="#">Lion's Mane</a></li>
                                                    <li><a href="#">Shiitake</a></li>
                                                    <li><a href="#">White Oyster</a></li>
                                                    <li><a href="#">Morel</a></li>
                                                    <li><a href="#">Enoki</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">Accesories
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <ul>
                                                    <li><a href="#">Kits</a></li>
                                                    <li><a href="#">Mushrooms</a></li>
                                                    <li><a href="#">Tools</a></li>
                                                    <li><a href="#">Substrates</a></li>
                                                    <li><a href="#">Cultures</a></li>
                                                    <li><a href="#">Bulk Order</a></li>
                                                    <li><a href="#">Guides</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">Kits
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                <ul>
                                                    <li><a href="#">Growing Tents</a></li>
                                                    <li><a href="#">Foraging Kits</a></li>
                                                    <li><a href="#">All in one kits</a></li>
                                                    <li><a href="#">Fruiting Kits</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingFour">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseFour" aria-expanded="false"
                                                    aria-controls="collapseThree">Mycology
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingFour">
                                            <div class="panel-body">
                                                <ul>
                                                    <li><a href="#">Extracts</a></li>
                                                    <li><a href="#">Substrates</a></li>
                                                    <li><a href="#">Tools</a></li>
                                                    <li><a href="#">Mushrooms</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-box-2">
                            <h2 class="heading">Price Range</h2>
                            <form method="post" class="colorlib-form-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="guests">Price from:</label>
                                            <div class="form-field">
                                                <i class="icon icon-arrow-down3"></i>
                                                <select name="people" id="people" class="form-control">
                                                    <option value="#">1</option>
                                                    <option value="#">200</option>
                                                    <option value="#">300</option>
                                                    <option value="#">400</option>
                                                    <option value="#">1000</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="guests">Price to:</label>
                                            <div class="form-field">
                                                <i class="icon icon-arrow-down3"></i>
                                                <select name="people" id="people" class="form-control">
                                                    <option value="#">2000</option>
                                                    <option value="#">4000</option>
                                                    <option value="#">6000</option>
                                                    <option value="#">8000</option>
                                                    <option value="#">10000</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</x-mylayouts.layout-default>
