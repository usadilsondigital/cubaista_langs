@extends('layouts.layout')
 
@section('current')
<li class="breadcrumb-item active" aria-current="page">{{ __('messages.product') }}</li>
@endsection

@section('content')
<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title"> {{ __('messages.product') }}</h5>   
        @can('admin') <a href="product" class="btn btn-primary"> {{ __('messages.create') }}
            {{ __('messages.products') }}</a>
        @endcan    
    </div>
</div>


<form method="POST" action="{{ route('product.store') }}">
    @csrf
    <input type="text" name="title" placeholder="{{ __('messages.title') }}" autocomplete="off" required
        data-bs-toggle="tooltip"
        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
        data-bs-title="only letters [max 4], example: 'es' to Spanish "
        pattern="[a-zA-Z]*" maxlength="4"
        class="form-control @error('title') is-invalid @enderror">{{ old('title') }}</input>
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br />

    <input type="text" name="description" placeholder="{{ __('messages.description') }}" autocomplete="off" required 
        data-bs-toggle="tooltip"
        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
        data-bs-title="English Name of the Language."
        class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</input>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br />
    <button type="submit" class="mt-4">{{ __('messages.save') }} {{ __('messages.language') }}</button>



</form>
@endsection

