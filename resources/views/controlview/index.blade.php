@extends('layouts.layout')
 
@section('current')
<li class="breadcrumb-item active" aria-current="page">Control</li>
@endsection

@section('content')
<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title"> {{ __('messages.control') }}  {{ __('messages.panel') }}</h5>       
    </div>
</div>

<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            {{ __('messages.users') }} 
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <strong> {{ __('messages.this') }}  {{ __('messages.is') }}   {{ __('messages.the') }}  {{ __('messages.accordion') }} {{ __('messages.body') }} </strong> 
            <p>   
                <a class="btn btn-outline-secondary" aria-current="page" href="{{ URL::route('users.index') }}">Users Admin</a></p>
        
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            {{ __('messages.languages') }} 
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <strong> {{ __('messages.this') }}  {{ __('messages.is') }}   {{ __('messages.the') }}  {{ __('messages.accordion') }} {{ __('messages.body') }} </strong> 
            <p>   
                <a class="btn btn-outline-secondary" aria-current="page" href="{{ URL::route('language.list') }}">Language Admin</a></p>
          
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            {{ __('messages.abouts') }} 
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong> {{ __('messages.this') }}  {{ __('messages.is') }}   {{ __('messages.the') }}  {{ __('messages.accordion') }} {{ __('messages.body') }} </strong> 
          <p>   
            <a class="btn btn-outline-secondary" aria-current="page" href="{{ URL::route('about.index') }}">About Admin</a></p>
          
        </div>
      </div>
    </div>
  </div>
@endsection

