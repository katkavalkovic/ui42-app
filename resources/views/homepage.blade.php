@extends('layouts.app')

@section('content')
    <div class="main-container d-flex flex-column justify-content-center align-items-center p-2">
        <h1 class="mb-4 text-align-center">{{ __('Vyhľadať v databáze obcí') }}</h1>
        <form class="w-100 d-flex justify-content-center">
            <input type="text" class="form-control px-4 py-2" placeholder="Zadajte názov" aria-label="Name of the searched city">
        </form>
    </div>
@endsection
