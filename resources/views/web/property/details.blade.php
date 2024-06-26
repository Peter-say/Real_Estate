@extends('web.layouts.app')

@section('contents')

    <!--=================================
                    Breadcrumb -->
    <div class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.html"> <i class="fas fa-home"></i> </a></li>
                        <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="#">Pages</a></li>
                        <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Stunning 2 bedroom
                                home in
                                village</span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--=================================
                    Breadcrumb -->

    <div class="wrapper">
        <!--=================================
                      Property details -->
        <section class="space-pt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-5 mb-lg-0 order-lg-2">
                        <div class="sticky-top">
                            <div class="mb-4">
                                <h3>{{ $property->name }}</h3>
                                <span class="d-block mb-3"><i class="fas fa-map-marker-alt fa-xs pe-2"></i>Virginia drive
                                    temple
                                    hills</span>
                                <span
                                    class="price font-xll text-primary d-block">${{ number_format($property->price) }}</span>
                                <span class="sub-price font-lg text-dark d-block"><b>$6,500/Sqft </b> </span>
                                <ul class="property-detail-meta list-unstyled ">
                                    <li><a href="#"> <i class="fas fa-star text-warning pe-2"></i>3.9/5 </a></li>
                                    <li class="share-box">
                                        <a href="#"> <i class="fas fa-share-alt"></i> </a>
                                        <ul class="list-unstyled share-box-social">
                                            <li> <a href="#"><i class="fab fa-facebook-f"></i></a> </li>
                                            <li> <a href="#"><i class="fab fa-twitter"></i></a> </li>
                                            <li> <a href="#"><i class="fab fa-linkedin"></i></a> </li>
                                            <li> <a href="#"><i class="fab fa-instagram"></i></a> </li>
                                            <li> <a href="#"><i class="fab fa-pinterest"></i></a> </li>
                                        </ul>
                                    </li>
                                    <li><a href="#"> <i class="fas fa-heart"></i> </a></li>
                                    <li><a href="#"> <i class="fas fa-exchange-alt"></i> </a></li>
                                    <li><a href="#"> <i class="fas fa-print"></i> </a></li>
                                </ul>
                            </div>
                            <div class="agent-contact">
                                @if ($property->agent)
                                    <div class="d-flex align-items-center p-4 border border-bottom-0">
                                        <div class="agent-contact-avatar me-3">
                                            <img class="img-fluid rounded-circle avatar avatar-xl"
                                                src="{{ $web_assets }}/images/avatar/01.jpg" alt="">
                                        </div>
                                        <div class="agent-contact-name">
                                            <h6>{{ $property->agent->full_name }}</h6>
                                            <a href="#">Company Agent</a>
                                            <span class="d-block"><i
                                                    class="fas fa-phone-volume pe-2 mt-2"></i>{{ $property->agent->phone_no ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-dark col b-radius-none">View listings</a>
                                        <a href="#" class="btn btn-primary col ms-0 b-radius-none">Request info</a>
                                    </div>
                                @else
                                    <div class="property-agent-info">
                                        <span class="property-agent-name">No Agent Assigned</span>
                                        <!-- Other agent details... -->
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 order-lg-1">
                        <div class="property-detail-img popup-gallery">
                            <div class="owl-carousel" data-animateOut="fadeOut" data-nav-arrow="true" data-items="1"
                                data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0"
                                data-loop="true">

                                <div class="item">
                                    @if (is_array(json_decode($property->images)) && count(json_decode($property->images)) === 1)
                                        @php
                                            $imagePaths = json_decode($property->images);
                                        @endphp
                                        <a class="portfolio-img"
                                            href="{{ asset('storage/property/images/' . $imagePaths[0]) }}"><img
                                                class="img-fluid"
                                                src="{{ asset('storage/property/images/' . $imagePaths[0]) }}"
                                                alt=""></a>
                                    @elseif (is_array(json_decode($property->images)) && count(json_decode($property->images)) > 1)
                                        @foreach (json_decode($property->images) as $imagePath)
                                            <a class="portfolio-img"
                                                href="{{ asset('storage/property/images/' . $imagePath) }}"><img
                                                    class="img-fluid"
                                                    src="{{ asset('storage/property/images/' . $imagePath) }}"
                                                    alt=""></a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="property-info mt-5">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>Property details</h5>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <ul class="property-list list-unstyled">
                                                <li><b>Property ID:</b> {{ $property->uuid }}</li>
                                                <li><b>Price:</b> ${{ number_format($property->price) }}</li>
                                                <li><b>Property Size:</b> {{ $property->size }} Sq Ft</li>
                                                <li><b>Bedrooms:</b> {{ $property->bedrooms }}</li>
                                                <li><b>Bathrooms:</b> {{ $property->bathrooms }}</li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="property-list list-unstyled">
                                                <li><b>Garage:</b> {{ $property->garage }}</li>
                                                <li><b>Garage Size:</b> {{ $property->garage_size }} SqFt</li>
                                                <li><b>Year Built:</b> {{ $property->year_built }}</li>
                                                <li><b>Property Type:</b> {{ $property->type }}</li>
                                                <li><b>Property Status:</b> {{ $property->stock_status }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="text-primary mb-3 mb-sm-0">Additional details</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="property-list list-unstyled mb-0">
                                                <li><b>Deposit:</b> 30%</li>
                                                <li><b>Pool Size:</b> 457 Sqft</li>
                                                <li><b>Last remodel year:</b> 1956</li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                        <div class="property-description">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>Description</h5>
                                </div>
                                <div class="col-sm-9">
                                    {{ $property->description }}
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                        <div class="property-features">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>Features</h5>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            @if ($property->specifications())
                                                <ul class="property-list-style-2 list-unstyled mb-0">
                                                    @foreach ($property->specifications as $spec)
                                                        <li>{{ $spec->feature }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p>No Features</p>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                        <div class="property-address">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>Address</h5>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <ul class="property-list list-unstyled mb-0">
                                                <li><b>Address:</b> {{ $property->address->street_address }}</li>
                                                <li><b>State:</b> {{ $property->address->state }}</li>
                                                <li><b>Area:</b> {{ $property->address->area }}</li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="property-list list-unstyled mb-0">
                                                <li><b>City:</b> {{ $property->address->city }}</li>
                                                <li><b>Zip:</b> {{ $property->address->zip }}</li>
                                                <li><b>Country:</b> {{ $property->address->country }}</li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                        <div class="property-floor-plans">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>Floor plans</h5>
                                </div>
                                <div class="col-sm-9">
                                    <div class="accordion-style-2" id="accordion">

                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="accordion-title mb-0">
                                                    <button
                                                        class="btn btn-link d-flex ms-auto align-items-center collapsed"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        Floor <i class="fas fa-chevron-down fa-xs"></i>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse accordion-content"
                                                aria-labelledby="headingTwo" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <p>{{ $property->floor_plan_description }}</p>
                                                    @if (is_array(json_decode($property->floor_plan_images)) && count(decode($property->floor_plan_images)) === 1)
                                                        @php
                                                            $imagePaths = $property->floor_plan_images;
                                                        @endphp
                                                        <img class="img-fluid"
                                                            src="{{ asset('storage/property/floor-plan/images/' . $imagePaths[0] ?? 'Not Available') }}"
                                                            alt="">
                                                    @elseif (is_array(json_decode($property->floor_plan_images)) && count(decode($property->floor_plan_images)) > 1)
                                                        @foreach ($property->floor_plan_images as $imagePath)
                                                            <img class="img-fluid"
                                                                src="{{ asset('storage/property/floor-plan/images/' . $imagePath) ?? 'Not Available' }}"
                                                                alt="">
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                        <div class="property-video">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>Property video</h5>
                                </div>
                                <div class="col-sm-9">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="546" height="315"
                                            src="{{asset('storage/property/videos/' . $property->property_video ?? 'Not Available') }}"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                      
                       
                        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                        <div class="property-schedule">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>Schedule a tour</h5>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="mb-3 col-sm-6 datetimepickers">
                                            <div class="input-group date" id="datetimepicker-01"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    placeholder="Date" data-target="#datetimepicker-01">
                                                <div class="input-group input-group-box" data-target="#datetimepicker-01"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text rounded-0 rounded-end"><i
                                                            class="far fa-calendar-alt"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-sm-6 datetimepickers">
                                            <div class="input-group date" id="datetimepicker-03"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    placeholder="Time" data-target="#datetimepicker-03" />
                                                <div class="input-group input-group-box" data-target="#datetimepicker-03"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text rounded-0 rounded-end"><i
                                                            class="far fa-clock"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-sm-12">
                                            <input type="text" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="mb-3 col-sm-12">
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="mb-3 col-sm-12">
                                            <input type="Text" class="form-control" placeholder="Phone">
                                        </div>
                                        <div class="mb-3 col-sm-12">
                                            <textarea class="form-control" rows="4" placeholder="Message"></textarea>
                                        </div>
                                        <div class="mb-3 col-sm-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        <div class="col-sm-6"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
                        <div class="property-statistics">
                            <div class="row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <h5>Page views statistics</h5>
                                </div>
                                <div class="col-sm-9">
                                    <img class="img-fluid"
                                        src="{{ $web_assets }}/images/property/views--statistics.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="space-pt">
            <div class="container">
                <hr class="mb-5 mt-0">
                <h5 class="mb-4">Similar properties</h5>
                <div class="row">

                   @foreach ($relatedProperties as $relatedProperty)
                   <div class="col-sm-6 col-md-4">
                    <div class="property-item">
                        <div class="property-image bg-overlay-gradient-04">

                                <img class="img-fluid" src="{{ asset('storage/property/images/' . (json_decode($relatedProperty->images)[0] ?? '')) }}" alt="">

                            <div class="property-lable">
                                <span class="badge badge-md bg-primary">{{$relatedProperty->type}}</span>
                                <span class="badge badge-md bg-info">{{$relatedProperty->stock_status}} </span>
                            </div>
                            <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
                            <div class="property-agent">
                                @if ($relatedProperty->agent)
                                    <div class="property-agent-image">
                                        <img class="img-fluid" src="{{asset("/web/images/avatar/01.jpg")}}" alt="">
                                    </div>
                                    <div class="property-agent-info">
                                        <a class="property-agent-name" href="#">{{ $relatedProperty->agent->full_name }}</a>
                                        <span class="d-block">Company Agent</span>
                                        <ul class="property-agent-contact list-unstyled">
                                            <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                                            <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                                        </ul>
                                    </div>
                                @else
                                    <div class="property-agent-info">
                                        <span class="property-agent-name">No Agent Assigned</span>
                                        <!-- Other agent details... -->
                                    </div>
                                @endif
                            </div>

                            <div class="property-agent-popup">
                                <a href="#"><i class="fas fa-camera"></i> 06</a>
                            </div>
                        </div>
                        <div class="property-details">
                            <div class="property-details-inner">
                                <h5 class="property-title"><a href="{{route('property.details', $relatedProperty->id)}}">{{$relatedProperty->name}} </a></h5>
                                <span class="property-address">
                                    <i class="fas fa-map-marker-alt fa-xs"></i>
                                    {{-- @foreach ($relatedProperties as $relatedProperty) --}}
                                    {{ $relatedProperty->address->street_address ?? 'No Address Available' }}
                                    {{-- @endforeach --}}
                                </span>
                                <span class="property-agent-date">
                                    <i class="far fa-clock fa-md"></i>{{ $relatedProperty->created_at->diffForHumans() }}
                                </span>
                                <div class="property-price">${{number_format($relatedProperty->price)}}<span> / month</span> </div>
                                <ul class="property-info list-unstyled d-flex">
                                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>{{ $relatedProperty->bedrooms }}</span></li>
                                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>{{ $relatedProperty->bathrooms }}</span></li>
                                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>{{$relatedProperty->square_ft}}m</span></li>
                                </ul>
                            </div>
                            <div class="property-btn">
                                <a class="property-link" href="{{ route('property.details', $relatedProperty->id) }}">See Details</a>
                                <ul class="property-listing-actions list-unstyled mb-0">
                                    <li class="property-compare">
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Compare" href="#"><i class="fas fa-exchange-alt"></i></a>
                                    </li>
                                    <li class="property-favourites">
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                   @endforeach
                   
                </div>
            </div>
        </section>
        <!--=================================
                      Property details -->

        <!--=================================
                    Review -->
        <section class="space-pb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4>Leave a review for joana williams</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="review d-flex">
                            <div class="review-avatar avatar avatar-xl me-3">
                                <img class="img-fluid rounded-circle" src="{{ $web_assets }}/images/avatar/01.jpg"
                                    alt="">
                            </div>
                            <div class="review-info flex-grow-1">
                                <span class="mb-2 d-block">Rating:</span>
                                <ul class="list-unstyled list-inline">
                                    <li class="list-inline-item m-0 text-warning"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item m-0 text-warning"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item m-0 text-warning"><i class="fas fa-star"></i></li>
                                    <li class="list-inline-item m-0 text-warning"><i class="fas fa-star-half-alt"></i>
                                    </li>
                                    <li class="list-inline-item m-0 text-warning"><i class="far fa-star"></i></li>
                                </ul>
                                <div class="mb-3">
                                    <span class="mb-2 d-block">Rating comment:</span>
                                    <div class="mb-3">
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <span> <a href="login.html"> <b>Login</b> </a> to leave a review</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
                    Review -->
    </div>

    <!--=================================
                    newsletter -->
    <section class="py-5 bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h3 class="text-white mb-0">Sign up to our newsletter to get the latest news and offers.</h3>
                </div>
                <div class="col-md-7 mt-3 mt-md-0">
                    <div class="newsletter">
                        <form>
                            <div class="mb-0">
                                <input type="email" class="form-control" placeholder="Enter email">
                            </div>
                            <button type="submit" class="btn btn-dark b-radius-left-none">Get notified</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                    newsletter -->
@endsection
