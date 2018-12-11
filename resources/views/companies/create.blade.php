@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Company</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <form method="POST" action="{{ route('companies.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="enter name" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="3" type="text" name="description" class="form-control" placeholder="enter description"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-3">
                <ul class="list-group" style="padding-top:30px;">
                    <li class="list-group-item">
                        <a href="{{ route('companies.index') }}">
                            All Companies
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection