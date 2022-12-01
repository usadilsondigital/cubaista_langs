@extends('layouts.layout')
 
@section('current')
<li class="breadcrumb-item active" aria-current="page">{{ __('messages.about') }}</li>
@endsection

@section('content')
<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title"> {{ __('messages.about') }}</h5>   
        @can('admin') <a href="about" class="btn btn-primary"> {{ __('messages.create') }}
            {{ __('messages.abouts') }}</a>
        @endcan    
    </div>
</div>


<table id="table_id" class="display">
    <thead>
        <tr>
            <th> {{ __('messages.title') }}</th>
            <th> {{ __('messages.body') }}</th>
            @can('admin')
                <th> {{ __('messages.options') }}</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach ($abouts as $about)
            <tr>
                <td>@if($about->active) @php echo ('<span class="badge bg-secondary">active</span>')@endphp @endif{{ $about->title }}</td>
                <td>{{ $about->body }}</td>
                @can('admin')
                    <td>
                        <!--<a type="button" class="btn btn-warning" href="about/{{ $about->id }}/edit">{{ __('messages.edit') }}</a>-->
                        <a type="button" class="btn btn-outline-secondary" href="about/{{ $about->id }}/translate">{{ __('messages.translate') }}</a>
                    </td>
                @endcan
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

