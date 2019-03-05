@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <form action="{{ route('sendMail.send') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Send To:</label>
                    <input class="form-control" name="email" />
                </div>
                <div class="form-group">
                    <label>Content:</label>
                    <textarea rows="3" class="form-control" name="content"> </textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Send Mail
                </button>
           </form>
        </div>
    </div>
</div>
@endsection
