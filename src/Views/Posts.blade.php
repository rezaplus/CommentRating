@extends('cmr::Master')

@section('cmr_content')
<h2>Posts</h2>
<ul class="list-group">
    @foreach ($posts as $post)
    <a href="/posts/comments/?post={{$post->post_id}}">
    <li class="list-group-item d-flex justify-content-between align-items-center comment-content">
        {{ $post->title }}
        <div style="width:350px">
            @for ($i = 1; $i <= 4 + 1; $i++) 
                @if ($i<=$post->post_rate)
                    <span style="width:20px; overflow:hidden;color: #ff9900;text-shadow: 0px 1px 9px #ff810087;" class="bi bi-star-fill"></span>
                @else
                    <span style="width:20px; overflow:hidden;" class="bi bi-star"></span>
                @endif
            @endfor
            <p style="display: contents;">{{$post->post_rate}}</p>
        </div>
        <span class="badge badge-primary badge-pill">{{ $post->comments_count }}</span>
    </li>
    </a>
    @endforeach
</ul>
@endsection