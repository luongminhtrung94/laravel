@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <ul class="list-group">
                    @foreach($companies as $company)
                    <li class="list-group-item">
                        <a href="/companies/{{ $company->id }}">
                            {{ $company->name }} 
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6">
            </div>
        </div>
    </div>

@endsection