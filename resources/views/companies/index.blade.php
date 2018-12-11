@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Companies</h1>
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
            <div class="col-xs-12 col-sm-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('companies.create') }}">
                            Create Company
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection