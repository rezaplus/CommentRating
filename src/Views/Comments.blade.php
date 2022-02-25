@extends('cmr::Master')

@section('cmr_content')
<a href="/posts/" class="d-inline"><span class="bi bi-arrow-left-square h4 mr-1"></span></a>
<h2 class="d-inline">Comments</h2>
<ul class="list-group">
    @foreach ($comments as $comment)
    <li class="list-group-item d-flex justify-content-between align-items-center comment-content">
        {{ $comment->content }}
        <div class="badge">
            @for ($i = 1; $i <= 4 + 1; $i++) 
                @if ($i<=$comment->rate)
                    <span style="width:20px; overflow:hidden;color: #ff9900;text-shadow: 0px 1px 9px #ff810087;" class="bi bi-star-fill"></span>
                @else
                    <span style="width:20px; overflow:hidden;" class="bi bi-star"></span>
                @endif
            @endfor
            <p style="display: contents;">{{$comment->rate}}</p>
        </div>
    </li>
    @endforeach
</ul>
@endsection