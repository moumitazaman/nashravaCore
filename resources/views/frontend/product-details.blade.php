@extends('frontend.layouts.master')

<link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/slick-theme.css') }}">
<link rel="stylesheet" href="{{ asset('public/backend/plugins/sweetalert2/sweetalert2.min.css') }}">
<style>
    .single-thumb {
        height: 20% !important;
    }

</style>

@section('css')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet"
type="text/css">
<!--<script src="js/jquery-1.9.1.min.js"></script>-->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="{{ asset('zoom/src/jquery.exzoom.js') }}"></script>
<link href="{{ asset('zoom/src/jquery.exzoom.css') }}" rel="stylesheet" type="text/css" />
<style>
#exzoom {
    width:350px;
    /*height: 400px;*/
}


.hidden {
    display: none;
}

</style>
@endsection
@section('content')
    <!-- Start Breadcrumb -->
    <div id="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <a href="{{ url('/') }}">Home</a> <span class="separator">&gt;</span>
                        <span>{{ $product->title }}<< /span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <!-- Start Banner -->
    <div id="banner-area" style="background: rgba(0, 0, 0, 0) url('img/banners/banner-1.jpg') no-repeat scroll center top;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-inner">
                        <a class="btn-lucian" href="#">{{ $product->title }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->
    <!-- Start Main Content -->
    <div id="main-content-area" class="padtop80 padbot15 my2">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <!-- Start Product Details Area -->
                            <div class="prodcut-details-area">
                                <div class="product-details-inner clearfix">
                                    <!-- Start Details Big Thumbnail -->
                                    <div class="zoomImageArea">
                                        <div class="exzoom hidden" id="exzoom">
                                            <div class="exzoom_img_box">
                                                <ul class='exzoom_img_ul'>
                                                    @foreach ($sub_images as $key => $image)
                                                        <li><img src="{{ url('public/upload/product_image/product_sub_images/' . $image->sub_image) }}" alt="Nashrava" /></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="exzoom_nav"></div>
                                            <p class="exzoom_btn">
                                                <a href="javascript:void(0);" class="exzoom_prev_btn">
                                                    < </a>
                                                        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- End Details Big Thumbnail -->
                                </div>
                            </div>
                            <!-- End Product Details Area -->
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="single-product-details-info">
                                <div class="product-info-area">
                                    <!-- Start Prodcut Top Info -->
                                    <div class="product-top-info">
                                        <h2 class="product-name">{{ $product->title }}
                                        </h2>
                                        <!-- Start Star Rating -->
                                        <!-- <div class="star-rating">
                                                        <ul>
                                                            <li class="star yes"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                            <li class="star yes"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                            <li class="star yes"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                            <li class="star yes"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                            <li class="star"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                        </ul>
                                                    </div>-->
                                        <!-- End Star Rating -->
                                        <!-- Start Product Description -->
                                        <div class="product-description">


                                            <p class="stock">Availability : <span>In Stock</span> <label>(<span
                                                        style="color:blue">{{ $product->qty }}</span> Available)</label>

                                            </p>
                                        </div>
                                        <!-- End Product Description -->
                                    </div>
                                    <!-- End Prodcut Top Info -->
                                    <!-- Start Bottom Top Info -->

                                    <div class="product-bottom-info">
                                        @php
                                            $price = $product->price - $product->discount;
                                        @endphp
                                        <span class="price">
                                            <span class="amount">BDT.
                                                {{ $price }}</span>@if ($product->discount) <span><del>{{ $product->price }}</del></span>@else <span><del>0.00</del></span>@endif
                                        </span>
                                        <div class="size-quantity-area clearfix">
                                            <!-- Start Size Area -->
                                            <!-- Start Size Area -->
                                            <div class="size-area">
                                                <h4>Size:</h4>
                                                <form id="cart">
                                                    @csrf
                                                    <input type="hidden" name="pid" id="pid" value="{{ $product->id }}">
                                                    @foreach ($productcount as $ps)
                                                        <input type="hidden" name="sid" id="sid{{ $ps->size_id }}"
                                                            value="{{ $ps->sizecount }}">

                                                    @endforeach
                                                    <div class="search-cat">

                                                        <select name="size_id" id="size_id"
                                                            class="form-control form-control-sm" required>
                                                            <option value="">Select Size</option>
                                                            @foreach ($product_sizes as $size)
                                                                <option value="{{ $size->size_id }}">
                                                                    {{ $size->size->size_name ?? '' }}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                            </div>


                                            <!-- End Size Area -->
                                            <!-- Start Quantity Area -->
                                            <div class="quantity-area">
                                                <h4>Quantity:</h4>
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1" id="quantity" name="quantity"
                                                        class="cart-plus-minus-box">
                                                    <div class="dec qtybutton">-</div>
                                                    <div class="inc qtybutton">+</div>
                                                </div>
                                            </div>
                                            <!-- End Quantity Area -->
                                        </div>



                                        <div class="product-cart-wishlist">
                                            <?php if($product->qty==0){?>
                                            <span class="add-to-cart">
                                                <a href="javascript:void(0)" class="cart"><i aria-hidden="true"
                                                        class="fa fa-frown-o"></i><span>Out of Stock</span></a>
                                            </span>
                                            <?php }else{?>
                                            <span class="add-to-cart">
                                                <a href="#" class="cart" onclick="myFunc()"><i aria-hidden="true"
                                                        class="fa fa-plus"></i><span>Add to Cart</span></a>
                                            </span>
                                            <span class="add-to-cart">
                                                <a href="#" class="btn btn-warning" onclick="myBuyFunc()"><i
                                                        aria-hidden="true" class="fa fa-arrow-right"></i><span>Buy
                                                        Now</span></a>
                                            </span>
                                            </form>
                                            <?php }?>
                                            <!-- Start Wish List  -->
                                            <span class="listview-wishlist">
                                                <a href="javascript:void(0)" data-id="{{ $product->id }}"
                                                    class="comp"><i aria-hidden="true" class="fa fa-exchange"></i>
                                                    Compare</a>
                                            </span>
                                            <!-- End Wish List  -->
                                        </div>
                                    </div>
                                    <!-- End Prodcut Bottom Info -->
                                </div>
                                <!-- End product info -->
                            </div>
                            <!-- End Single Product Details Info -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Start Product Description Tab -->
                            <div class="product-description-tab">
                                <!-- Start Description Menu -->
                                <div class="description-tab-menu">
                                    <ul role="tablist" class="clearfix">
                                        <li class="active" role="presentation"><a data-toggle="tab" role="tab"
                                                aria-controls="description" href="#description"
                                                aria-expanded="true">Description</a></li>
                                        <li role="presentation" class=""><a data-toggle=" tab" role="tab"
                                            aria-controls="specification" href="#specification" aria-expanded="false">
                                            Measurement</a></li>
                                        <!-- <li role="presentation" class=""><a data-toggle="tab" role="tab" aria-controls="review" href="#review" aria-expanded="false">Reviews</a></li>-->
                                    </ul>
                                </div>
                                <!-- End Description Menu -->
                                <!-- Start Tab Content -->
                                <div class="tab-content">
                                    <!-- Start Tab Panel -->
                                    <div id="description" class="tab-pane active" role="tabpanel">
                                        <p>
                                            {{ $product->details }}

                                        </p>
                                    </div>
                                    <!-- End Tab Panel -->
                                    <!-- Start Tab Panel -->
                                    <div id="specification" class="tab-pane" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">Position</th>
                                                        <th scope="col">X-Small</th>
                                                        <th scope="col">Small</th>

                                                        <th scope="col">Medium</th>
                                                        <th scope="col">Large</th>
                                                        <th scope="col">X-Large</th>
                                                        <th scope="col">XX-Large</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
        $measures=App\Model\ProductMeasurement::where('product_id',$product->id)->get();

        foreach($measures as $measure){
            $sz=App\Model\SizeMeasurement::where('id',$measure->size_id)->first();

        ?>
                                                    <tr>
                                                        <th scope="row">{{ $sz->measurement }}</th>
                                                        <td>{{ $measure->x_small }}</td>
                                                        <td>{{ $measure->small }}</td>
                                                        <td>{{ $measure->medium }}</td>
                                                        <td>{{ $measure->large }}</td>
                                                        <td>{{ $measure->x_large }}</td>
                                                        <td>{{ $measure->xx_large }}</td>



                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- <div id="review" class="tab-pane" role="tabpanel">
                                                    <p>Similique animi consequatur pariatur voluptas tempore, dolores obcaecati dolorum quia odit harum. Quos nemo, minima totam quidem ipsum labore.</p>
                                                    <ul>
                                                        <li>Minus placeat eligendi neque doloribus sed ratione repellendus a illo similique, sint quisquam perferendis eum nam nihil dolor fugit blanditiis, explicabo, recusandae hic qui exercitationem aspernatur excepturi voluptate unde. </li>
                                                        <li>Quaerat magnam, perferendis, sapiente doloremque error omnis esse in saepe quos eveniet quasi ex fugit eligendi consectetur nobis amet. </li>
                                                    </ul>
                                                </div>-->
                                    <!-- End Tab Panel -->
                                </div>
                                <!-- End Tab Content -->
                            </div>
                            <!-- Start Product Description Tab -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Start Sidebar -->
                    <aside>
                        <!-- Start Single Sidebar -->
                        <!--  <div class="single-sidebar">
                                       <div class="single-category-item">
                                            <div class="category-thumb">
                                                <img alt="" src="img/products/products-details/2.jpg">
                                                <a class="btn-lucian" href="#">Men</a>
                                            </div>
                                       </div>
                                    </div>	-->
                        <!-- End Single Sidebar -->
                        <!-- Start Single Sidebar -->
                        <div class="single-sidebar">
                            <div class="related-prodcuts-area">
                                <h2 class="related-product-title">related</h2>
                                <!-- Start Related Prodcuts -->
                                <div class="related-produts">
                                    <div class="related-product-carousel-active">
                                        <div class="related-produt-group">
                                            <!-- Start single product -->
                                            @foreach ($all_products as $singleproduct)
                                                <div class="single-related-product">
                                                    <div class="related-pro-thumb">
                                                        <img src="{{ asset($singleproduct->image) }}"
                                                            alt="product picture" />
                                                        @if ($product->qty == 0)
                                                            <div class="carousel-caption">
                                                                <h5 style="color:#ffffff;">Out of Stock</h5>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="relate-product-info">
                                                        <div class="product-short-info">
                                                            <!-- Start product short description -->
                                                            <p class="p-short-des"><a
                                                                    href="{{ route('product.details', $singleproduct->slug) }}">{{ $singleproduct->title }}</a>
                                                            </p>
                                                            <!-- End product short description -->
                                                            <!-- Start Star Rating -->
                                                            <!-- <div class="star-rating">
                                                                        <ul>
                                                                            <li class="star yes"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                                            <li class="star yes"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                                            <li class="star yes"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                                            <li class="star yes"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                                            <li class="star"><i aria-hidden="true" class="fa fa-star"></i></li>
                                                                        </ul>
                                                                    </div>-->
                                                            <!-- End Star Rating -->
                                                        </div>
                                                        <div class="product-price-area">
                                                            @php
                                                                $price = $singleproduct->price - $singleproduct->discount;
                                                            @endphp
                                                            <span class="price">
                                                                <span class="amount">BDT.
                                                                    {{ $price }}</span>@if ($singleproduct->discount) <span><del>{{ $singleproduct->price }}</del></span>@else <span><del>0.00</del></span> @endif
                                                            </span>
                                                            <span class="add-to-cart"><a href="javascript:void(0)"
                                                                    data-id="{{ $singleproduct->id }}"
                                                                    class="comp"><i aria-hidden="true"
                                                                        class="fa fa-exchange"></i> Compare</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End single product -->
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- End Related Prodcuts -->
                            </div>
                        </div>
                        <!-- End Single Sidebar -->
                    </aside>
                    <!-- End Sidebar -->
                </div>
            </div>
        </div>
        <!-- Start New Products -->

        <!-- End New Products -->
    </div>
    <!-- End Main Content -->
    <!-- Start Brand Logos Area -->
    <div id="brand-logos-area" class="padtop45 padbot45">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Brand Logo -->
                    <div class="brand-logos">
                        <div id="brand-loago-carousel">
                            <!-- <div class="single-brand">
                                            <a href="#"><img src="img/brandlogo/brand-logo-1.jpg" alt="Brand Logo" /></a>
                                        </div>
                                        <div class="single-brand">
                                            <a href="#"><img src="img/brandlogo/brand-logo-2.jpg" alt="Brand Logo" /></a>
                                        </div>
                                        <div class="single-brand">
                                            <a href="#"><img src="img/brandlogo/brand-logo-3.jpg" alt="Brand Logo" /></a>
                                        </div>
                                        <div class="single-brand">
                                            <a href="#"><img src="img/brandlogo/brand-logo-4.jpg" alt="Brand Logo" /></a>
                                        </div>
                                        <div class="single-brand">
                                            <a href="#"><img src="img/brandlogo/brand-logo-5.jpg" alt="Brand Logo" /></a>
                                        </div>
                                        <div class="single-brand">
                                            <a href="#"><img src="img/brandlogo/brand-logo-6.jpg" alt="Brand Logo" /></a>
                                        </div>
                                        <div class="single-brand">
                                            <a href="#"><img src="img/brandlogo/brand-logo-2.jpg" alt="Brand Logo" /></a>
                                        </div>
                                        <div class="single-brand">
                                            <a href="#"><img src="img/brandlogo/brand-logo-4.jpg" alt="Brand Logo" /></a>
                                        </div>
                                        <div class="single-brand">
                                            <a href="#"><img src="img/brandlogo/brand-logo-3.jpg" alt="Brand Logo" /></a>
                                        </div>	-->
                        </div>
                    </div>
                    <!-- End Brand Logo -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Brand Logos Area -->
    <!-- Start Newsletter Area -->
    <div id="news-letter-area" class="padtop25 padbot25">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-5 col-lg-4">
                    <!-- Start Newletter Title -->
                    <div class="news-letter-title">
                        <h3>Sign up for newsletter</h3>
                    </div>
                    <!-- End Newletter Title -->
                </div>
                <div class="col-sm-6 col-md-5 col-lg-6">
                    <!-- Start Newsletter Form -->
                    <div class="newsletter-form">
                        <form action="#" class="news-form">
                            <input type="text" class="f-form" />
                            <input type="submit" value="subcribe" class="f-submit" />
                        </form>
                    </div>
                    <!-- End Newsletter Form -->
                </div>
                <div class="hidden-xs hidden-sm col-md-2  col-lg-2">
                    <!-- Start Footer Social Icons -->
                    <div class="social-icons footer-sicons">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss-square"></i></a></li>
                        </ul>
                    </div>
                    <!-- End Footer Social Icons -->
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="text-align:center;">Product Added to Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="mymodal">
                    <div class="col-md-6">
                        <div class="product-gallery">
                            <div class="cols-1">
                                <figure class="product-image">
                                    <img src="" class="proimage" alt="Nashrava" width="580" height="580">
                                </figure>

                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-details scrollable">
                            <h2 class="product-name"><span class="product_name"></span></h2>
                            <!--<div class="product-meta">
                CATEGORY: <span class="product-sku">12345670</span>
                BRAND: <span class="product-brand">The Northland</span>
               </div>-->
                            <h5><label>Quantity:</label> <span class="quantity"></span></h5>

                            <div class="product-price">
                                <h5><label>Price:</label> BDT.<span class="price"></span>
                            </div>
                            </h5>
                            <div class="ratings-container">
                                <!--<div class="ratings-full">
                 <span class="ratings" style="width:80%"></span>
                 <span class="tooltiptext tooltip-top"></span>
                </div>-->
                                <!--<a href="#product-tab-reviews" class="rating-reviews">( 6 reviews )</a>-->

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping</button>
                        <a href="{{ route('view.cart') }}"><button type="button" class="btn view-more">View
                                Cart</button></a>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('frontend/js/vendor/jquery-1.12.4.min.js') }}"></script>

        <script src="{{ asset('public/backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script>
            function myFunc() {

                var pid = $('#pid').val();
                var size = $('#size_id').val();
                var quantity = $('#quantity').val();
                var sid = $('#sid' + size).val();

                if (quantity <= sid) {

                    var j = 0;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url: "{{ route('insert.cart') }}",
                        data: {
                            id: pid,
                            size: size,
                            quantity: quantity
                        },

                        success: function(data) {
                            /*	Swal.fire({
                                    text: 'Product Added',
                            		type: 'success',
                            		timer: 4000,
                            		showCancelButton: false,
                              showConfirmButton: false

                                  })*/

                            $("#myModal").modal('show');
                            var imgsrc = "<?php echo asset('/'); ?>" + data.img;
                            var price = quantity * data.price;
                            $(".mymodal .product_name").text(data.product_name);
                            $(".mymodal .proimage").attr('src', imgsrc);
                            $(".mymodal .price").text(price);

                            $(".mymodal .quantity").text(quantity);

                            $(".header-cart").load("  .header-cart >*");


                        },
                        error: function(xhr) {
                            var errorMessage = '<div class="card bg-danger">\n' +
                                '                        <div class="card-body text-center p-5">\n' +
                                '                            <span class="text-white">';
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                errorMessage += ('' + value + '<br>');
                            });
                            errorMessage += '</span>\n' +
                                '                        </div>\n' +
                                '                    </div>';
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                footer: errorMessage,
                            });
                        },


                    });

                } else if (size == 0) {
                    Swal.fire({
                        text: 'Please Select Your Size',
                        type: 'error',
                        timer: 4000,
                        showCancelButton: true,
                        showConfirmButton: false

                    })
                } else {
                    Swal.fire({
                        text: 'Sorry Less Product in Stock Right Now',
                        type: 'error',
                        timer: 4000,
                        showCancelButton: true,
                        showConfirmButton: false

                    })

                }
                event.preventDefault();
            }


            function myBuyFunc() {

                var pid = $('#pid').val();
                var size = $('#size_id').val();
                var quantity = $('#quantity').val();
                var sid = $('#sid' + size).val();

                if (quantity <= sid) {

                    var j = 0;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url: "{{ route('insert.cart') }}",
                        data: {
                            id: pid,
                            size: size,
                            quantity: quantity
                        },

                        success: function(data) {
                            /*	Swal.fire({
                                    text: 'Product Added',
                            		type: 'success',
                            		timer: 4000,
                            		showCancelButton: false,
                              showConfirmButton: false

                                  })*/
                            $("#myModal").modal('show');
                            var imgsrc = "<?php echo asset('/'); ?>" + data.img;
                            var price = quantity * data.price;
                            $(".mymodal .product_name").text(data.product_name);
                            $(".mymodal .proimage").attr('src', imgsrc);
                            $(".mymodal .price").text(price);

                            $(".mymodal .quantity").text(quantity);

                            $(".header-cart").load("  .header-cart >*");
                            window.location.href = 'https://nashrava.co/checkout';



                        },
                        error: function(xhr) {
                            var errorMessage = '<div class="card bg-danger">\n' +
                                '                        <div class="card-body text-center p-5">\n' +
                                '                            <span class="text-white">';
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                errorMessage += ('' + value + '<br>');
                            });
                            errorMessage += '</span>\n' +
                                '                        </div>\n' +
                                '                    </div>';
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                footer: errorMessage,
                            });
                        },


                    });

                } else if (size == 0) {
                    Swal.fire({
                        text: 'Please Select Your Size',
                        type: 'error',
                        timer: 4000,
                        showCancelButton: true,
                        showConfirmButton: false

                    })
                } else {
                    Swal.fire({
                        text: 'Sorry Less Product in Stock Right Now',
                        type: 'error',
                        timer: 4000,
                        showCancelButton: true,
                        showConfirmButton: false

                    })

                }
                event.preventDefault();
            }
        </script>
        <script>
            function Single() {
                var pid = $('.pid').val();
                var size = $('#size_id').val();
                var quantity = $('#quantity').val();

                var j = 0;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ route('insert.cart') }}",
                    data: {
                        id: pid,
                        size_id: size,
                        quantity: quantity
                    },

                    success: function(data) {
                        Swal.fire({
                            text: 'Product Added',
                            type: 'success',
                            timer: 4000,
                            showCancelButton: false,
                            showConfirmButton: false

                        })



                    },
                    error: function(xhr) {
                        var errorMessage = '<div class="card bg-danger">\n' +
                            '                        <div class="card-body text-center p-5">\n' +
                            '                            <span class="text-white">';
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            errorMessage += ('' + value + '<br>');
                        });
                        errorMessage += '</span>\n' +
                            '                        </div>\n' +
                            '                    </div>';
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            footer: errorMessage
                        });
                    },


                });
                event.preventDefault();


            }
        </script>

        <!-- End Newsletter Area -->
@endsection
@section('js')

<script>
    !function(e,t){"function"==typeof define&&define.amd?define("ev-emitter/ev-emitter",t):"object"==typeof module&&module.exports?module.exports=t():e.EvEmitter=t()}("undefined"!=typeof window?window:this,function(){function e(){}var t=e.prototype;return t.on=function(e,t){if(e&&t){var i=this._events=this._events||{},n=i[e]=i[e]||[];return n.indexOf(t)==-1&&n.push(t),this}},t.once=function(e,t){if(e&&t){this.on(e,t);var i=this._onceEvents=this._onceEvents||{},n=i[e]=i[e]||{};return n[t]=!0,this}},t.off=function(e,t){var i=this._events&&this._events[e];if(i&&i.length){var n=i.indexOf(t);return n!=-1&&i.splice(n,1),this}},t.emitEvent=function(e,t){var i=this._events&&this._events[e];if(i&&i.length){i=i.slice(0),t=t||[];for(var n=this._onceEvents&&this._onceEvents[e],o=0;o<i.length;o++){var r=i[o],s=n&&n[r];s&&(this.off(e,r),delete n[r]),r.apply(this,t)}return this}},t.allOff=function(){delete this._events,delete this._onceEvents},e}),function(e,t){"use strict";"function"==typeof define&&define.amd?define(["ev-emitter/ev-emitter"],function(i){return t(e,i)}):"object"==typeof module&&module.exports?module.exports=t(e,require("ev-emitter")):e.imagesLoaded=t(e,e.EvEmitter)}("undefined"!=typeof window?window:this,function(e,t){function i(e,t){for(var i in t)e[i]=t[i];return e}function n(e){if(Array.isArray(e))return e;var t="object"==typeof e&&"number"==typeof e.length;return t?d.call(e):[e]}function o(e,t,r){if(!(this instanceof o))return new o(e,t,r);var s=e;return"string"==typeof e&&(s=document.querySelectorAll(e)),s?(this.elements=n(s),this.options=i({},this.options),"function"==typeof t?r=t:i(this.options,t),r&&this.on("always",r),this.getImages(),h&&(this.jqDeferred=new h.Deferred),void setTimeout(this.check.bind(this))):void a.error("Bad element for imagesLoaded "+(s||e))}function r(e){this.img=e}function s(e,t){this.url=e,this.element=t,this.img=new Image}var h=e.jQuery,a=e.console,d=Array.prototype.slice;o.prototype=Object.create(t.prototype),o.prototype.options={},o.prototype.getImages=function(){this.images=[],this.elements.forEach(this.addElementImages,this)},o.prototype.addElementImages=function(e){"IMG"==e.nodeName&&this.addImage(e),this.options.background===!0&&this.addElementBackgroundImages(e);var t=e.nodeType;if(t&&u[t]){for(var i=e.querySelectorAll("img"),n=0;n<i.length;n++){var o=i[n];this.addImage(o)}if("string"==typeof this.options.background){var r=e.querySelectorAll(this.options.background);for(n=0;n<r.length;n++){var s=r[n];this.addElementBackgroundImages(s)}}}};var u={1:!0,9:!0,11:!0};return o.prototype.addElementBackgroundImages=function(e){var t=getComputedStyle(e);if(t)for(var i=/url\((['"])?(.*?)\1\)/gi,n=i.exec(t.backgroundImage);null!==n;){var o=n&&n[2];o&&this.addBackground(o,e),n=i.exec(t.backgroundImage)}},o.prototype.addImage=function(e){var t=new r(e);this.images.push(t)},o.prototype.addBackground=function(e,t){var i=new s(e,t);this.images.push(i)},o.prototype.check=function(){function e(e,i,n){setTimeout(function(){t.progress(e,i,n)})}var t=this;return this.progressedCount=0,this.hasAnyBroken=!1,this.images.length?void this.images.forEach(function(t){t.once("progress",e),t.check()}):void this.complete()},o.prototype.progress=function(e,t,i){this.progressedCount++,this.hasAnyBroken=this.hasAnyBroken||!e.isLoaded,this.emitEvent("progress",[this,e,t]),this.jqDeferred&&this.jqDeferred.notify&&this.jqDeferred.notify(this,e),this.progressedCount==this.images.length&&this.complete(),this.options.debug&&a&&a.log("progress: "+i,e,t)},o.prototype.complete=function(){var e=this.hasAnyBroken?"fail":"done";if(this.isComplete=!0,this.emitEvent(e,[this]),this.emitEvent("always",[this]),this.jqDeferred){var t=this.hasAnyBroken?"reject":"resolve";this.jqDeferred[t](this)}},r.prototype=Object.create(t.prototype),r.prototype.check=function(){var e=this.getIsImageComplete();return e?void this.confirm(0!==this.img.naturalWidth,"naturalWidth"):(this.proxyImage=new Image,this.proxyImage.addEventListener("load",this),this.proxyImage.addEventListener("error",this),this.img.addEventListener("load",this),this.img.addEventListener("error",this),void(this.proxyImage.src=this.img.src))},r.prototype.getIsImageComplete=function(){return this.img.complete&&this.img.naturalWidth},r.prototype.confirm=function(e,t){this.isLoaded=e,this.emitEvent("progress",[this,this.img,t])},r.prototype.handleEvent=function(e){var t="on"+e.type;this[t]&&this[t](e)},r.prototype.onload=function(){this.confirm(!0,"onload"),this.unbindEvents()},r.prototype.onerror=function(){this.confirm(!1,"onerror"),this.unbindEvents()},r.prototype.unbindEvents=function(){this.proxyImage.removeEventListener("load",this),this.proxyImage.removeEventListener("error",this),this.img.removeEventListener("load",this),this.img.removeEventListener("error",this)},s.prototype=Object.create(r.prototype),s.prototype.check=function(){this.img.addEventListener("load",this),this.img.addEventListener("error",this),this.img.src=this.url;var e=this.getIsImageComplete();e&&(this.confirm(0!==this.img.naturalWidth,"naturalWidth"),this.unbindEvents())},s.prototype.unbindEvents=function(){this.img.removeEventListener("load",this),this.img.removeEventListener("error",this)},s.prototype.confirm=function(e,t){this.isLoaded=e,this.emitEvent("progress",[this,this.element,t])},o.makeJQueryPlugin=function(t){t=t||e.jQuery,t&&(h=t,h.fn.imagesLoaded=function(e,t){var i=new o(this,e,t);return i.jqDeferred.promise(h(this))})},o.makeJQueryPlugin(),o});


</script>
<script>
    ;(function ($, window) {
    let ele = null,
        exzoom_img_box = null,
        boxWidth = null,
        boxHeight = null,
        exzoom_img_ul_outer = null,//ç”¨äºŽé™åˆ¶ ul å®½åº¦,åˆä¸å½±å“æ”¾å¤§é•œåŒºåŸŸ
        exzoom_img_ul = null,
        exzoom_img_ul_position = 0,//å¾ªçŽ¯å›¾ç‰‡åŒºåŸŸçš„è¾¹è·,ç”¨äºŽç§»åŠ¨æ—¶è·Ÿéšå…‰æ ‡
        exzoom_img_ul_width = 0,//å¾ªçŽ¯å›¾ç‰‡åŒºåŸŸçš„æœ€å¤§å®½åº¦
        exzoom_img_ul_max_margin = 0,//å¾ªçŽ¯å›¾ç‰‡åŒºåŸŸçš„æœ€å¤§å¤–è¾¹è·,åº”è¯¥æ˜¯å›¾ç‰‡æ•°é‡å‡ä¸€ä¹˜ä»¥boxWidth
        exzoom_nav = null,
        exzoom_nav_inner = null,
        navHightClass = "current",//å½“å‰å›¾ç‰‡çš„ç±»,
        exzoom_navSpan = null,
        navHeightWithBorder = null,
        images = null,
        exzoom_prev_btn = null,//å¯¼èˆªä¸Šä¸€å¼ å›¾ç‰‡
        exzoom_next_btn = null,//å¯¼èˆªä¸‹ä¸€å¼ å›¾ç‰‡
        imgNum = 0,//å›¾ç‰‡çš„æ•°é‡
        imgIndex = 0,//å½“å‰å›¾ç‰‡çš„ç´¢å¼•
        imgArr = [],//å›¾ç‰‡å±žæ€§çš„æ•°å­—
        exzoom_zoom = null,
        exzoom_main_img = null,
        exzoom_zoom_outer = null,
        exzoom_preview = null,//é¢„è§ˆåŒºåŸŸ
        exzoom_preview_img = null,//é¢„è§ˆåŒºåŸŸçš„å›¾ç‰‡
        autoPlayInterval = null,//ç”¨äºŽæŽ§åˆ¶è‡ªåŠ¨æ’­æ”¾çš„é—´éš”æ—¶é—´
        startX = 0,//ç§»åŠ¨å…‰æ ‡çš„èµ·å§‹åæ ‡
        startY = 0,//ç§»åŠ¨å…‰æ ‡çš„èµ·å§‹åæ ‡
        endX = 0,//ç§»åŠ¨å…‰æ ‡çš„ç»ˆæ­¢åæ ‡
        endY = 0,//ç§»åŠ¨å…‰æ ‡çš„ç»ˆæ­¢åæ ‡
        g = {},//å…¨å±€å˜é‡
        defaults = {
            "navWidth": 60,//åˆ—è¡¨æ¯ä¸ªå®½åº¦,è¯¥ç‰ˆæœ¬ä¸­è¯·æŠŠå®½é«˜å¡«å†™æˆä¸€æ ·
            "navHeight": 60,//åˆ—è¡¨æ¯ä¸ªé«˜åº¦,è¯¥ç‰ˆæœ¬ä¸­è¯·æŠŠå®½é«˜å¡«å†™æˆä¸€æ ·
            "navItemNum": 5,//åˆ—è¡¨æ˜¾ç¤ºä¸ªæ•°
            "navItemMargin": 7,//åˆ—è¡¨é—´éš”
            "navBorder": 1,//åˆ—è¡¨è¾¹æ¡†ï¼Œæ²¡æœ‰è¾¹æ¡†å¡«å†™0ï¼Œè¾¹æ¡†åœ¨cssä¸­ä¿®æ”¹
            "autoPlay": true,//æ˜¯å¦è‡ªåŠ¨æ’­æ”¾
            "autoPlayTimeout": 2000,//æ’­æ”¾é—´éš”æ—¶é—´
        };


    let methods = {
        init: function (options) {
            let opts = $.extend({}, defaults, options);

            ele = this;
            exzoom_img_box = ele.find(".exzoom_img_box");
            exzoom_img_ul = ele.find(".exzoom_img_ul");
            exzoom_nav = ele.find(".exzoom_nav");
            exzoom_prev_btn = ele.find(".exzoom_prev_btn");//ç¼©ç•¥å›¾å¯¼èˆªä¸Šä¸€å¼ æŒ‰é’®
            exzoom_next_btn = ele.find(".exzoom_next_btn");//ç¼©ç•¥å›¾å¯¼èˆªä¸‹ä¸€å¼ æŒ‰é’®

            //todo ä»¥åŽå¯ä»¥åˆ†å¼€å®½åº¦å’Œé«˜åº¦çš„é™åˆ¶
            boxHeight = boxWidth = ele.outerWidth();  //åœ¨å°å±å¹•ä¸­,æœ‰ padding çš„æƒ…å†µä¸‹,è®¡ç®—ä¸å‡†,éœ€è¦æ‰‹åŠ¨æŒ‡å®š ele çš„å®½åº¦

            // console.log("boxWidth::" + boxWidth);
            // console.log("ele.parent().width()::" + ele.parent().width());
            // console.log("ele.parent().outerWidth()::" + ele.parent().outerWidth());
            // console.log("ele.parent().innerWidth()::" + ele.parent().innerWidth());

            //todo ç¼©ç•¥å›¾å¯¼èˆªçš„é«˜åº¦å’Œå®½åº¦å¯ä»¥æ”¹ä¸ºæ ¹æ® å¯¼èˆªæ å®½åº¦ å’Œ navItemNum è®¡ç®—å‡ºæ¥,ä½†æ˜¯å¯¹äºŽä¸åŒå°ºå¯¸çš„ä¸å¥½å¤„ç†
            g.navWidth = opts.navWidth;
            g.navHeight = opts.navHeight;
            g.navBorder = opts.navBorder;
            g.navItemMargin = opts.navItemMargin;
            g.navItemNum = opts.navItemNum;
            g.autoPlay = opts.autoPlay;
            g.autoPlayTimeout = opts.autoPlayTimeout;

            images = exzoom_img_box.find("img");
            imgNum = images.length;//å›¾ç‰‡çš„æ•°é‡
            checkLoadedAllImages(images)//æ£€æŸ¥å›¾ç‰‡æ˜¯å¦å¥åœ¨å®Œæˆ,å…¨éƒ¨åŠ è½½å®Œæˆçš„ä¼šæ‰§è¡Œåˆå§‹åŒ–
        },
        prev: function () {             //ä¸Šä¸€å¼ å›¾ç‰‡
            moveLeft()
        },
        next: function () {            //ä¸‹ä¸€å¼ å›¾ç‰‡
            moveRight();
        },
        setImg: function () {            //è®¾ç½®å¤§å›¾
            let url = arguments[0];

            getImageSize(url, function (width, height) {
                exzoom_preview_img.attr("src", url);
                exzoom_main_img.attr("src", url);

                //todo æœªæµ‹è¯•
                //åˆ¤æ–­å·²æœ‰çš„å›¾ç‰‡æ•°é‡æ˜¯å¦åˆæœ€åˆçš„ä¸€è‡´,ä¸æ˜¯çš„è¯å°±å…ˆåˆ é™¤æœ€åŽä¸€ä¸ª
                if (exzoom_img_ul.find("li").length === imgNum + 1) {
                    exzoom_img_ul.find("li:last").remove();
                }
                exzoom_img_ul.append('<li style="width: ' + boxWidth + 'px;">' +
                    '<img src="' + url + '"></li>');

                let image_prop = copute_image_prop(url, width, height);
                previewImg(image_prop);
            });
        },
    };

    $.fn.extend({
        "exzoom": function (method, options) {
            if (arguments.length === 0 || (typeof method === 'object' && !options)) {
                if (this.length === 0) {
                    // alert("è°ƒç”¨ jQuery.exzomm æ—¶çš„é€‰æ‹©å™¨ä¸ºç©º");
                    $.error('Selector is empty when call jQuery.exzomm');
                } else {
                    return methods.init.apply(this, arguments);
                }
            } else if (methods[method]) {
                return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
            } else {
                // alert("è°ƒç”¨äº† jQuery.exzomm ä¸­ä¸å­˜åœ¨çš„æ–¹æ³•");
                $.error('Method ' + method + 'does not exist on jQuery.exzomm');
            }
        }
    });

    /**
     * åˆå§‹åŒ–
     */
    function init() {
        exzoom_img_box.append("<div class='exzoom_img_ul_outer'></div>");
        exzoom_nav.append("<p class='exzoom_nav_inner'></p>");
        exzoom_img_ul_outer = exzoom_img_box.find(".exzoom_img_ul_outer");
        exzoom_nav_inner = exzoom_nav.find(".exzoom_nav_inner");

        //æŠŠ exzoom_img_ul ç§»åŠ¨åˆ° exzoom_img_ul_outer é‡Œ
        exzoom_img_ul_outer.append(exzoom_img_ul);

        //å¾ªçŽ¯æ‰€æœ‰å›¾ç‰‡,è®¡ç®—å°ºå¯¸,æ·»åŠ ç¼©ç•¥å›¾å¯¼èˆª
        for (let i = 0; i < imgNum; i++) {
            imgArr[i] = copute_image_prop(images.eq(i));//è®°å½•å›¾ç‰‡çš„å°ºå¯¸å±žæ€§ç­‰
            console.log(imgArr[i]);
            let li = exzoom_img_ul.find("li").eq(i);
            li.css("width", boxWidth);//è®¾ç½®å›¾ç‰‡ä¸Šçº§çš„ li å…ƒç´ çš„å®½åº¦
            li.find("img").css({
                "margin-top": imgArr[i][5],
                "width": imgArr[i][3]
            });
        }

        //ç¼©ç•¥å›¾å¯¼èˆª
        exzoom_navSpan = exzoom_nav.find("span");
        navHeightWithBorder = g.navBorder * 2 + g.navHeight;
        g.exzoom_navWidth = (navHeightWithBorder + g.navItemMargin) * g.navItemNum;
        g.exzoom_nav_innerWidth = (navHeightWithBorder + g.navItemMargin) * imgNum;

        exzoom_navSpan.eq(imgIndex).addClass(navHightClass);
        exzoom_nav.css({
            "height": navHeightWithBorder + "px",
            "width": boxWidth - exzoom_prev_btn.width() - exzoom_next_btn.width(),
        });
        exzoom_nav_inner.css({
            "width": g.exzoom_nav_innerWidth + "px"
        });
        exzoom_navSpan.css({
            "margin-left": g.navItemMargin + "px",
            "width": g.navWidth + "px",
            "height": g.navHeight + "px",
        });

        //è®¾ç½®æ»šåŠ¨åŒºåŸŸçš„å®½åº¦
        exzoom_img_ul_width = boxWidth * imgNum;
        exzoom_img_ul_max_margin = boxWidth * (imgNum - 1);
        exzoom_img_ul.css("width", exzoom_img_ul_width);
        //æ·»åŠ æ”¾å¤§é•œ
        exzoom_img_box.append(`
<div class='exzoom_zoom_outer'>
    <span class='exzoom_zoom'></span>
</div>
<p class='exzoom_preview'>
    <img class='exzoom_preview_img' src='' />
</p>
            `);
        exzoom_zoom = exzoom_img_box.find(".exzoom_zoom");
        exzoom_main_img = exzoom_img_box.find(".exzoom_main_img");
        exzoom_zoom_outer = exzoom_img_box.find(".exzoom_zoom_outer");
        exzoom_preview = exzoom_img_box.find(".exzoom_preview");
        exzoom_preview_img = exzoom_img_box.find(".exzoom_preview_img");

        //è®¾ç½®å¤§å›¾å’Œé¢„è§ˆå›¾åŒºåŸŸ
        exzoom_img_box.css({
            "width": boxHeight + "px",
            "height": boxHeight + "px",
        });

        exzoom_img_ul_outer.css({
            "width": boxHeight + "px",
            "height": boxHeight + "px",
        });

        exzoom_preview.css({
            "width": boxHeight + "px",
            "height": boxHeight + "px",
            "left": boxHeight + 5 + "px",//æ·»åŠ ä¸ªè¾¹è·
        });

        previewImg(imgArr[imgIndex]);
        autoPlay();//è‡ªåŠ¨æ’­æ”¾
        bindingEvent();//ç»‘å®šäº‹ä»¶
    }

    /**
     * æ£€æµ‹å›¾ç‰‡æ˜¯å¦åŠ è½½å®Œæˆ
     * @param images
     */
    function checkLoadedAllImages(images) {
        let timer = setInterval(function () {
            let loaded_images_counter = 0;
            let all_images_num = images.length;
            images.each(function () {
                if (this.complete) {
                    loaded_images_counter++;
                }
            });
            if (loaded_images_counter === all_images_num) {
                clearInterval(timer);
                init();
            }
        }, 100)
    }

    /**
     * èŽ·å–å…‰æ ‡åæ ‡,å¦‚æžœæ˜¯ touch äº‹ä»¶,åªå¤„ç†ç¬¬ä¸€ä¸ª
     */
    function getCursorCoords(event) {
        let e = event || window.event;
        let coords_data = e, //è®°å½•åæ ‡çš„æ•°æ®,é»˜è®¤ä¸º event æœ¬èº«,ç§»åŠ¨ç«¯çš„ touch ä¼šä¿®æ”¹
            x,//x è½´
            y;//y è½´

        if (e["touches"] !== undefined) {
            if (e["touches"].length > 0) {
                coords_data = e["touches"][0];
            }
        }

        x = coords_data.clientX || coords_data.pageX;
        y = coords_data.clientY || coords_data.pageY;

        return {'x': x, 'y': y}
    }

    /**
     * æ£€æŸ¥ç§»åŠ¨ç«¯è§¦æ‘¸æ»‘åŠ¨çš„ä½ç½®
     */
    function checkNewPositionLimit(new_position) {
        if (-new_position > exzoom_img_ul_max_margin) {
            //é™åˆ¶å‘å³çš„èŒƒå›´
            new_position = -exzoom_img_ul_max_margin;
            imgIndex = 0;//å‘å³è¶…å‡ºèŒƒå›´çš„å›žåˆ°ç¬¬ä¸€ä¸ª
        } else if (new_position > 0) {
            //é™åˆ¶å‘å·¦çš„èŒƒå›´
            new_position = 0;
        }
        return new_position
    }

    /**
     * ç»‘å®šå„ç§äº‹ä»¶
     */
    function bindingEvent() {
        //ç§»åŠ¨ç«¯å¤§å›¾åŒºåŸŸçš„ touchend äº‹ä»¶
        exzoom_img_ul.on("touchstart", function (event) {
            let coords = getCursorCoords(event);
            startX = coords.x;
            startY = coords.y;

            let left = exzoom_img_ul.css("left");
            exzoom_img_ul_position = parseInt(left);

            window.clearInterval(autoPlayInterval);//åœæ­¢è‡ªåŠ¨æ’­æ”¾
        });

        //ç§»åŠ¨ç«¯å¤§å›¾åŒºåŸŸçš„ touchmove äº‹ä»¶
        exzoom_img_ul.on("touchmove", function (event) {
            let coords = getCursorCoords(event);
            let new_position;
            endX = coords.x;
            endY = coords.y;

            //åªè·Ÿéšå…‰æ ‡ç§»åŠ¨
            new_position = exzoom_img_ul_position + endX - startX;
            new_position = checkNewPositionLimit(new_position);
            exzoom_img_ul.css("left", new_position);

        });

        //ç§»åŠ¨ç«¯å¤§å›¾åŒºåŸŸçš„ touchend äº‹ä»¶
        exzoom_img_ul.on("touchend", function (event) {
            //è§¦å±æ»‘åŠ¨,æ ¹æ®ç§»åŠ¨æ–¹å‘æŒ‰å€æ•°å¯¹é½å…ƒç´
            console.log(endX < startX);
            if (endX < startX) {
                //å‘å·¦æ»‘åŠ¨
                moveRight();
            } else if (endX > startX) {
                //å‘å³æ»‘åŠ¨
                moveLeft();
            }

            autoPlay();//æ¢å¤è‡ªåŠ¨æ’­æ”¾
        });

        //å¤§å±å¹•åœ¨æ”¾å¤§åŒºåŸŸç‚¹å‡»,åˆ¤æ–­å‘å·¦è¿˜æ˜¯å‘å³ç§»åŠ¨
        exzoom_zoom_outer.on("mousedown", function (event) {
            let coords = getCursorCoords(event);
            startX = coords.x;
            startY = coords.y;

            let left = exzoom_img_ul.css("left");
            exzoom_img_ul_position = parseInt(left);
        });

        exzoom_zoom_outer.on("mouseup", function (event) {
            let offset = ele.offset();

            if (startX - offset.left < boxWidth / 2) {
                //åœ¨æ”¾å¤§é•œçš„å·¦åŠéƒ¨åˆ†ç‚¹å‡»
                moveLeft();
            } else if (startX - offset.left > boxWidth / 2) {
                //åœ¨æ”¾å¤§é•œçš„å³åŠéƒ¨åˆ†ç‚¹å‡»
                moveRight();
            }
        });

        //è¿›å…¥ exzoom åœæ­¢è‡ªåŠ¨æ’­æ”¾
        ele.on("mouseenter", function () {
            window.clearInterval(autoPlayInterval);//åœæ­¢è‡ªåŠ¨æ’­æ”¾
        });
        //ç¦»å¼€ exzoom å¼€å§‹è‡ªåŠ¨æ’­æ”¾
        ele.on("mouseleave", function () {
            autoPlay();//æ¢å¤è‡ªåŠ¨æ’­æ”¾
        });

        //å¤§å±å¹•è¿›å…¥å¤§å›¾åŒºåŸŸ
        exzoom_zoom_outer.on("mouseenter", function () {
            exzoom_zoom.css("display", "block");
            exzoom_preview.css("display", "block");
        });

        //å¤§å±å¹•åœ¨å¤§å›¾åŒºåŸŸç§»åŠ¨
        exzoom_zoom_outer.on("mousemove", function (e) {
            let width_limit = exzoom_zoom.width() / 2,
                max_X = exzoom_zoom_outer.width() - width_limit,
                max_Y = exzoom_zoom_outer.height() - width_limit,
                current_X = e.pageX - exzoom_zoom_outer.offset().left,
                current_Y = e.pageY - exzoom_zoom_outer.offset().top,
                move_X = current_X - width_limit,
                move_Y = current_Y - width_limit;

            if (current_X <= width_limit) {
                move_X = 0;
            }
            if (current_X >= max_X) {
                move_X = max_X - width_limit;
            }
            if (current_Y <= width_limit) {
                move_Y = 0;
            }
            if (current_Y >= max_Y) {
                move_Y = max_Y - width_limit;
            }
            exzoom_zoom.css({"left": move_X + "px", "top": move_Y + "px"});

            exzoom_preview_img.css({
                "left": -move_X * exzoom_preview.width() / exzoom_zoom.width() + "px",
                "top": -move_Y * exzoom_preview.width() / exzoom_zoom.width() + "px"
            });
        });

        //å¤§å±å¹•ç¦»å¼€å¤§å›¾åŒºåŸŸ
        exzoom_zoom_outer.on("mouseleave", function () {
            exzoom_zoom.css("display", "none");
            exzoom_preview.css("display", "none");
        });

        //å¤§å±å¹•å…‰å®è¿›å…¥æ”¾å¤§é¢„è§ˆåŒºåŸŸ
        exzoom_preview.on("mouseenter", function () {
            exzoom_zoom.css("display", "none");
            exzoom_preview.css("display", "none");
        });

        //ç¼©ç•¥å›¾å¯¼èˆª
        exzoom_next_btn.on("click", function () {
            moveRight();
        });
        exzoom_prev_btn.on("click", function () {
            moveLeft();
        });

        exzoom_navSpan.hover(function () {
            imgIndex = $(this).index();
            move(imgIndex);
        });
    }

    /**
     * èšç„¦åœ¨å¯¼èˆªå›¾ç‰‡ä¸Š,å·¦å³ç§»åŠ¨éƒ½ä¼šè°ƒç”¨
     * @param direction: æ–¹å‘,right | left,å¿…å¡«
     */
    function move(direction) {
        if (typeof direction === "undefined") {
            alert("exzoom ä¸­çš„ move å‡½æ•°çš„ direction å‚æ•°å¿…å¡«");
        }
        //å¦‚æžœè¶…å‡ºå›¾ç‰‡æ•°é‡äº†,è¿”å›žç¬¬ä¸€å¼
        if (imgIndex > imgArr.length - 1) {
            imgIndex = 0;
        }

        //è®¾ç½®é«˜äº®
        exzoom_navSpan.eq(imgIndex).addClass(navHightClass).siblings().removeClass(navHightClass);

        //åˆ¤æ–­ç¼©ç•¥å›¾å¯¼èˆªæ˜¯å¦éœ€è¦é‡æ–°è®¾ç½®åç§»é‡
        let exzoom_nav_width = exzoom_nav.width();
        let nav_item_width = g.navItemMargin + g.navWidth + g.navBorder * 2; // å•ä¸ªå¯¼èˆªå…ƒç´ çš„å®½åº¦
        let new_nav_offset = 0;

        //ç›´æŽ¥å¯¹æ¯”å½“å‰ç´¢å¼•çš„å›¾ç‰‡å æ®çš„å®½åº¦å’Œexzoomçš„å®½åº¦çš„å·®ä½œä¸ºåç§»é‡å³å¯
        let temp = nav_item_width * (imgIndex + 1);
        if (temp > exzoom_nav_width) {
            new_nav_offset =  boxWidth - temp;
        }

        exzoom_nav_inner.css({
            "left": new_nav_offset
        });

        //åˆ‡æ¢å¤§å›¾
        let new_position = -boxWidth * imgIndex;
        //åœ¨ animate æ–¹æ³•å‰å…ˆè°ƒç”¨ stop() ,é¿å…ååº”è¿Ÿé’
        new_position = checkNewPositionLimit(new_position);
        exzoom_img_ul.stop().animate({"left": new_position}, 500);
        //å¤„ç†æ”¾å¤§åŒºåŸŸ
        previewImg(imgArr[imgIndex]);
    }

    /**
     * å¯¼èˆªå‘å³
     */
    function moveRight() {
        imgIndex++;//å…ˆå¢žåŠ  index,åŽé¢åˆ¤æ–­èŒƒå›´
        if (imgIndex > imgNum) {
            imgIndex = imgNum;
        }
        move("right");
    }

    /**
     * å¯¼èˆªå‘å·¦
     */
    function moveLeft() {
        imgIndex--;//å…ˆå‡å°‘ index,åŽé¢åˆ¤æ–­èŒƒå›´
        if (imgIndex < 0) {
            imgIndex = 0;
        }
        move("left");
    }

    /**
     * è‡ªåŠ¨æ’­æ”¾
     */
    function autoPlay() {
        if (g.autoPlay) {
            autoPlayInterval = window.setInterval(function () {
                if (imgIndex >= imgNum) {
                    imgIndex = 0;
                }
                imgIndex++;
                move("right");
            }, g.autoPlayTimeout);
        }
    }

    /**
     * é¢„è§ˆå›¾ç‰‡
     */
    function previewImg(image_prop) {
        if (image_prop === undefined) {
            return
        }
        exzoom_preview_img.attr("src", image_prop[0]);

        exzoom_main_img.attr("src", image_prop[0])
            .css({
                "width": image_prop[3] + "px",
                "height": image_prop[4] + "px"
            });
        exzoom_zoom_outer.css({
            "width": image_prop[3] + "px",
            "height": image_prop[4] + "px",
            "top": image_prop[5] + "px",
            "left": image_prop[6] + "px",
            "position": "relative"
        });
        exzoom_zoom.css({
            "width": image_prop[7] + "px",
            "height": image_prop[7] + "px"
        });
        exzoom_preview_img.css({
            "width": image_prop[8] + "px",
            "height": image_prop[9] + "px"
        });
    }

    /**
     * èŽ·å¾—å›¾ç‰‡çš„çœŸå®žå°ºå¯¸
     * @param url
     * @param callback
     */
    function getImageSize(url, callback) {
        let img = new Image();
        img.src = url;

        // å¦‚æžœå›¾ç‰‡è¢«ç¼“å­˜ï¼Œåˆ™ç›´æŽ¥è¿”å›žç¼“å­˜æ•°æ®
        if (typeof callback !== "undefined") {
            if (img.complete) {
                callback(img.width, img.height);
            } else {
                // å®Œå…¨åŠ è½½å®Œæ¯•çš„äº‹ä»¶
                img.onload = function () {
                    callback(img.width, img.height);
                }
            }
        } else {
            return {
                width: img.width,
                height: img.height
            }
        }
    }

    /**
     * è®¡ç®—å›¾ç‰‡å±žæ€§
     * @param image : jquery å¯¹è±¡æˆ– å›¾ç‰‡urlåœ°å€
     * @param width : image ä¸ºå›¾ç‰‡urlåœ°å€æ—¶æŒ‡å®šå®½åº¦
     * @param height : image ä¸ºå›¾ç‰‡urlåœ°å€æ—¶æŒ‡å®šé«˜åº¦
     * @returns {Array}
     */
    function copute_image_prop(image, width, height) {
        let src;
        let res = [];

        if (typeof image === "string") {
            src = image;
        } else {
            src = image.attr("src");
            let size = getImageSize(src);
            width = size.width;
            height = size.height;
        }

        res[0] = src;
        res[1] = width;
        res[2] = height;
        let img_scale = res[1] / res[2];

        if (img_scale === 1) {
            res[3] = boxHeight;//width
            res[4] = boxHeight;//height
            res[5] = 0;//top
            res[6] = 0;//left
            res[7] = boxHeight / 2;
            res[8] = boxHeight * 2;//width
            res[9] = boxHeight * 2;//height
            exzoom_nav_inner.append(`<span><img src="${src}" width="${g.navWidth }" height="${g.navHeight }"/></span>`);
        } else if (img_scale > 1) {
            res[3] = boxHeight;//width
            res[4] = boxHeight / img_scale;
            res[5] = (boxHeight - res[4]) / 2;
            res[6] = 0;//left
            res[7] = res[4] / 2;
            res[8] = boxHeight * 2 * img_scale;//width
            res[9] = boxHeight * 2;//height
            let top = (g.navHeight - (g.navWidth / img_scale)) / 2;
            exzoom_nav_inner.append(`<span><img src="${src}" width="${g.navWidth }" style='top:${top}px;' /></span>`);
        } else if (img_scale < 1) {
            res[3] = boxHeight * img_scale;//width
            res[4] = boxHeight;//height
            res[5] = 0;//top
            res[6] = (boxHeight - res[3]) / 2;
            res[7] = res[3] / 2;
            res[8] = boxHeight * 2;//width
            res[9] = boxHeight * 2 / img_scale;
            let top = (g.navWidth - (g.navHeight * img_scale)) / 2;
            exzoom_nav_inner.append(`<span><img src="${src}" height="${g.navHeight}" style="left:${top}px;"/></span>`);
        }

        return res;
    }

// é—­åŒ…ç»“æŸ
})(jQuery, window);
</script>


@endsection
