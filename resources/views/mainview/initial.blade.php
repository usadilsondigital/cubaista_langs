@extends('layouts.layout')
 
@section('current')
<li class="breadcrumb-item active" aria-current="page">Initial</li>
@endsection

@section('content')
<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title"> {{ __('messages.inital') }}</h5>       
    </div>
</div>
@endsection

