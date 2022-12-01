@extends('layouts.layout')

@section('current')
    <li class="breadcrumb-item active" aria-current="page">{{ __('messages.create') }} {{ __('messages.about') }}</li>
@endsection

@section('content')
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title"> {{ __('messages.about') }}</h5>
            @can('admin')
                <a href="about" class="btn btn-primary"> {{ __('messages.create') }}
                    {{ __('messages.abouts') }}</a>
            @endcan
        </div>
    </div>
    
    <form method="POST" action="{{ route('about.translatestore') }}">
        @csrf
        <input type="hidden" name="id" value="{{$id}}"/>
        <input type="text" name="title" placeholder="{{ $about->title }}" autocomplete="off" required
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
            data-bs-title="{{ __('messages.title') }}"
            class="form-control @error('title') is-invalid @enderror">{{ old('title') }}</input>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br />

        <input type="text" name="body" placeholder="{{ $about->body }}" autocomplete="off" required
            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
            data-bs-title="{{ __('messages.body') }}"
            class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</input>
        @error('body')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br />
        <select name="selected_lang" class="form-select" aria-label="Default select example">
            @foreach ($codes as $locale)
                <option value="{{ $locale }}">{{ $locale }}</option>
            @endforeach
        </select>
        <br />
        <button type="submit" class="mt-4">{{ __('messages.save') }} {{ __('messages.about') }}</button>

    </form>
@endsection
