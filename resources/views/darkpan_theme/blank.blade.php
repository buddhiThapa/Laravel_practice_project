@extends('layouts.DarkPan_layout')

@section('content')
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    {{-- <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0"> --}}
        {{-- <div class="col-md-6 text-center">
            <h3>This is blank page</h3> --}}

            <div class="row">
                
                @php
                    // $response = json_decode($data,true);

                @endphp
                    @foreach ($data['data'] as $key=>$val)    
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <div class="image-container">
                                    <div class="first">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="discount">-25%</span>
                                            <span class="wishlist"><i class="fa fa-heart-o"></i></span>
                                        </div>
                                    </div>
                                
                                    <img src={{ $val['master_image'] }} class="img-thumbnail rounded thumbnail-image" style=" height: '200px'"/>
                                </div>
                                <div class="product-detail-container p-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="dress-name">{{ $val['title'] }}</h5>
                                            <div class="d-flex flex-column mb-2">
                                                <span class="new-price">${{ $val['offer_price'] }}</span>
                                                <small class="old-price text-right">${{ $val['main_price'] }}</small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center pt-1">
                                            <div class="color-select d-flex ">
                                            Quantity  <span class="item-size mr-2 btn" type="button" style=" margin: '7px'">{{ $val['qty'] }}</span> 
                                            </div>
                                            <div class="d-flex ">
                                            {{ $val['weighttype'] }}
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center pt-1">
                                            <div>
                                                <i class="fa fa-star-o rating-star"></i>
                                                <span class="rating-number">4.8</span>
                                            </div>
                                            <span class="buy">BUY +</span>
                                        </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                
            </div>
                

        {{-- </div> --}}
    {{-- </div> --}}
</div>
<!-- Blank End -->

@endsection
