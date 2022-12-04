@extends('layouts.layout')
 
@section('current')
<li class="breadcrumb-item active" aria-current="page"> {{ __('messages.create') }}  {{ __('messages.language') }}</li>
@endsection

@section('content')
<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title"> {{ __('messages.languages') }}</h5>
       @can('admin') <a href="language" class="btn btn-primary"> {{ __('messages.create') }}
            {{ __('messages.language') }}</a>
        @endcan
    </div>
</div>

<form method="POST" action="{{ route('language.store') }}">
    @csrf
    <input type="text" name="code" placeholder="{{ __('messages.code') }}" autocomplete="off" required
        data-bs-toggle="tooltip"
        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
        data-bs-title="only letters [max 4], example: 'es' to Spanish "
        pattern="[a-zA-Z]*" maxlength="4"
        class="form-control @error('code') is-invalid @enderror">{{ old('code') }}</input>
    @error('code')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br />

    <input type="text" name="english_name" placeholder="{{ __('messages.english_name') }}" autocomplete="off" required 
        data-bs-toggle="tooltip"
        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
        data-bs-title="English Name of the Language."
        class="form-control @error('english_name') is-invalid @enderror">{{ old('english_name') }}</input>
    @error('english_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br />

    <select class="form-control @error('directionality') is-invalid @enderror"
        aria-label="Default select example" name="directionality" required 
        data-bs-toggle="tooltip"
        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
        data-bs-title="Orientation of the Language.">
        <option value="ltr">{{ __('messages.left') }} {{ __('messages.top') }} {{ __('messages.right') }}</option>
        <option value="rtl">{{ __('messages.right') }} {{ __('messages.top') }} {{ __('messages.left') }}</option>
    </select>
    @error('directionality')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br />

    <input type="text" name="local_name" placeholder="{{ __('messages.local') }} {{ __('messages.name') }}" autocomplete="off"
        data-bs-toggle="tooltip"
        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
        data-bs-title="Local Name example: 'Español' to Spanish "
        class="form-control @error('local_name') is-invalid @enderror">{{ old('local_name') }}</input>
    @error('local_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br />

    <input type="text" name="url_wiki" placeholder="{{ __('messages.url') }} {{ __('messages.wiki') }}" autocomplete="off" z
        data-bs-toggle="tooltip"
        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
        data-bs-title="'https://en.wikipedia.org/wiki/Main_Page'"
        class="form-control @error('url_wiki') is-invalid @enderror">{{ old('url_wiki') }}</input>
    @error('url_wiki')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br />
    <!--  <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback" :messages="$errors - > get('url_wiki')" class="mt-2">
        Please enter a message in the textarea.
      </div>-->



    <button type="submit" class="mt-4">{{ __('messages.save') }} {{ __('messages.language') }}</button>



</form>
@endsection


