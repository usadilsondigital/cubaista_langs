@extends('layouts.layout')
 
@section('current')
<li class="breadcrumb-item active" aria-current="page">Languages</li>
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

<table id="table_id" class="display">
    <thead>
        <tr>
            <th> {{ __('messages.code') }}</th>
            <th> {{ __('messages.english_name') }}</th>
            @can('admin')
                <th> {{ __('messages.options') }}</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach ($languages as $lang)
            <tr>
                <td>{{ $lang->code }}</td>
                <td>{{ $lang->english_name }}</td>
                @can('admin')
                    <td>
                        <a type="button" class="btn btn-warning"
                            href="language/{{ $lang->id }}/edit">{{ __('messages.edit') }}</a>
                    </td>
                @endcan
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
