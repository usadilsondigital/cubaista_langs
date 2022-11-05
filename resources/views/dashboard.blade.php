@extends('layouts.layout')
 
@section('current')
<li class="breadcrumb-item active" aria-current="page"> {{ __('messages.dashboard') }}</li>
@endsection

@section('content')
<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title"> {{ __('messages.dashboard') }}</h5>       
    </div>
</div>
@endsection
