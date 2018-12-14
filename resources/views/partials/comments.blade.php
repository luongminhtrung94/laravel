@if(count($comments) > 0 )
<h1>Comments</h1>
<ul class="list-group">
    @foreach($comments as $comment)
    <li class="list-group-item">
        <div>url: {{ $comment->url }}</div>
        <div>body: {{ $comment->body }}</div>
    </li>
    @endforeach
</ul>
@endif