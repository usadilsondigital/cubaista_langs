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


<table id="table_id" class="display">
    <thead>
        <tr>
            <th> {{ __('messages.title') }}</th>
            <th> {{ __('messages.description') }}</th>
            @can('admin')
                <th> {{ __('messages.options') }}</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $prod)
            <tr>
                <td>{{ $prod->title }}</td>
                <td>{{ $prod->description }}</td>
                @can('admin')
                    <td>
                        <a type="button" class="btn btn-warning"
                            href="language/{{ $prod->id }}/edit">{{ __('messages.edit') }}</a>
                    </td>
                @endcan
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

