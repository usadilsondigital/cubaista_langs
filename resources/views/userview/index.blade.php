@extends('layouts.layout')
 
@section('current')
<li class="breadcrumb-item active" aria-current="page">{{ __('messages.user') }}</li>
@endsection

@section('content')
<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title"> {{ __('messages.user') }}</h5>
    </div>
</div>


<table id="table_id" class="display">
    <thead>
        <tr>
            <th> {{ __('messages.name') }}</th>
            <th> {{ __('messages.email') }}</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>                
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

