@extends('layouts.app')

@section('content')
    <hr>
    <div class="container detail-container">
        <h1 class="mb-4 text-align-center">{{ __('Detail obce') }}</h1>
        <div class="row detail-card mx-1 mx-md-0">
            <div class="col-12 col-lg-6 left-card-side">
                <div class="row">
                    <div class="col-12 col-md-6 mb-md-2 fw-bold">
                        {{ __('Meno starostu') }}:
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        {{ $city['mayor_name'] }}
                    </div>
                    <div class="col-12 col-md-6 mb-md-2 fw-bold">
                        {{ __('Adresa obecného úradu') }}:
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        {{ $city['city_hall_address'] }}
                    </div>
                    <div class="col-12 col-md-6 mb-md-2 fw-bold">
                        {{ __('Telefón') }}:
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        {{ $city['phone'] }}
                    </div>
                    <div class="col-12 col-md-6 mb-md-2 fw-bold">
                        {{ __('Fax') }}:
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        {{ $city['fax'] }}
                    </div>
                    <div class="col-12 col-md-6 mb-md-2 fw-bold">
                        {{ __('Email') }}:
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        @foreach ($city->emails as $email)
                            {{ $email['email'] }}
                        @endforeach
                    </div>
                    <div class="col-12 col-md-6 mb-md-2 fw-bold">
                        {{ __('Web') }}:
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        @foreach ($city->webAddresses as $webAddress)
                            {{ $webAddress['web_address'] }}
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 right-card-side">
                <div class="d-flex flex-column w-100 h-100 justify-content-center align-items-center">
                    <img src="{{asset('').'/'.$city['img_path']}}" height="120px" alt="Erb obce {{$city['name']}}.">
                    <h2 class="mt-3">{{ $city['name'] }}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
