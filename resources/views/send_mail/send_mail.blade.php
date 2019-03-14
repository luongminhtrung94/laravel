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
<example-component></example-component>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 style="padding-top:30px">Send Mail via API</h1>
            <div class="form-group">
                <label>Send To:</label>
                <input class="form-control" name="apiEmail" />
            </div>
            <div class="form-group">
                <label>Content:</label>
                <textarea rows="3" class="form-control" name="apiContent"> </textarea>
            </div>

            <button id="sendMailApi" type="button" class="btn btn-primary">
                Send Mail
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>    
    $(window).on("load", function(){
        $("#sendMailApi").on("click" , function(){
            submitSendMail();
        });


        function submitSendMail(){
            var formData = new FormData();
            formData.append("email" , $(`*[name='apiEmail']`).val() );
            formData.append("content" , $(`*[name='apiContent']`).val() );

            $.ajax({
                type: "POST",
                url: "{{ route('api.sendMail') }}",
                data: formData,
                success: submitSendMailSuccess, 
                contentType: false, 
                processData: false,
            });
        }

        function submitSendMailSuccess(res){
            console.log(res);
        }

        function submitSendMailError(error){

        }
    });
</script>
@endpush