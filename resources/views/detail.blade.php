@extends('layouts.app')

@section('content')
    <hr>
    <div class="container detail-container">
        <h1 class="mb-4 text-align-center">{{ __('Detail obce') }}</h1>
        <div class="row detail-card">
            <div class="col-6 left-card-side">
                <div class="d-flex justify-content-center align-items-center">
                    <table>
                        <tr>
                            <th>{{ __('Meno starostu') }}:</th>
                            <td>{{ $city['mayor_name'] }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Adresa obecného úradu') }}:</th>
                            <td>{{ $city['city_hall_address'] }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Telefón') }}:</th>
                            <td>{{ $city['phone'] }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Fax') }}:</th>
                            <td>{{ $city['fax'] }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('Email') }}:</th>

                            <td>
                                @foreach ($emails as $email)
                                    {{ $email['email'] }}
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __('Web') }}:</th>
                            <td>{{ $city['web_address'] }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-6 right-card-side">
                <div class="d-flex flex-column w-100 h-100 justify-content-center align-items-center">
                    <img src="{{asset('').'/'.$city['img_path']}}" height="120px" alt="Erb obce {{$city['name']}}.">
                    <h2 class="mt-3">{{ $city['name'] }}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
