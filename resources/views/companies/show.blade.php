@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        ID: {{ $company->id }}
                    </li>
                    <li class="list-group-item">
                        Name: {{ $company->name }}
                    </li>
                    <li class="list-group-item">
                        Description: {{ $company->description }}
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6">
            </div>
        </div>
    </div>

@endsection