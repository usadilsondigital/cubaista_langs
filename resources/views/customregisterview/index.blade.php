@extends('layouts.layout')

@section('script_begin')

    function validateForm2() {
        let pass1 = document.getElementById('password').value;
        let pass2 = document.getElementById('password_confirmation').value;
        if (pass1 !== pass2) {
            alert("Both passwords must match");
            return false;
        }
        else {
        return true;
        }
    } 
@endsection
 
@section('current')
<li class="breadcrumb-item active" aria-current="page">{{ __('messages.product') }}</li>
@endsection

@section('content')
<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title"> {{ __('messages.register') }}</h5>   
        @can('admin') <a href="product" class="btn btn-primary"> {{ __('messages.create') }}
            {{ __('messages.products') }}</a>
        @endcan    
    </div>
</div>


<form name="myFormRegister" action="{{ route('custom.store') }}" onsubmit="return validateForm2();" method="post">
    @csrf
    <div id="myRegisterDiv">
        <div>
            <input type="text" class="form-control" id="email" placeholder="{{ $email }}"
                value="{{ $email }}" name="email" autocomplete="off" readonly="readonly">
        </div>
        <!-- Password -->
        <div>
            <input
                class="form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                id="password" type="password" name="password" required="required" autocomplete="off"
                placeholder="{{ __('messages.password') }}">
        </div>
        <!-- Confirm Password -->
        <div>
            <input
                class="form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                id="password_confirmation" type="password" name="password_confirmation"
                required="required" placeholder="{{ __('messages.confirmed') }} {{ __('messages.password') }}">
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('messages.already') }} {{ __('messages.registered') }}?
            </a>

            <button type="submit" class="mt-4">{{ __('messages.register') }}</button>


        </div>
    </div>
</form>
@endsection

