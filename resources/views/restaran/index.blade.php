@extends('layout.app')
@section('content')
{{--    @php $lang = Illuminate\Support\Facades\Session::get('locale') @endphp--}}
    <!-- Menu Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">{{__('index.food')}}</h5>
                <h1 class="mb-5">{{__('index.Most Popular Items')}}</h1>
            </div>

            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                @foreach($categories as $category)
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active"  href="{{route('menu',$category->id)}}">
                            <img src="{{asset('asset/'.$category->image)}}" alt="rasm" width="80px" height="60px">
                            <div class="ps-3">
                              <small class="text-body">Popular</small>

                                <h6 class="mt-n1 mb-0">{{($category->{'name_' . app()->getLocale()})}}</h6>
                            </div>
                        </a>
                    </li>
                </ul>
                @endforeach

                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            @if(empty(!$dishes))
                            @foreach($dishes as $dish)
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{asset('asset/'.$dish->image)}}" alt="" style="width: 80px; height: 60px">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{($dish->{'name_'.app()->getLocale()})}}</span>
                                            <span class="text-primary">$115</span>
                                        </h5>
                                        <small class="fst-italic">{{($dish->{'desc_'.app()->getLocale()})}}</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu End -->
@endsection("content")
