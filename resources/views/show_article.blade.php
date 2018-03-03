@extends('layouts.app')
@section('content')
    <!-- Page Header -->
    <header class="masthead">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{!! $article->title !!}</h1>
                        <h2 class="subheading">{!! $article->short_text !!}</h2>
                        <span class="meta"> Опубликовал
                <a href="#">{{$article->author}}</a>
                 в {!! $article->created_at->format('H:i - d/m/Y') !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! $article->full_text !!}
                </div>

            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            @foreach($comments as $comment)
                <div class="comment" style="border:1px solid #004085;">
                    <p>{{_user($comment->user_id)->email}}</p>
                    <p>{{$comment->created_at->format('d-m-Y')}}</p>
                    <p>{!! $comment->comment !!}</p>
                </div>
            @endforeach
        <br><br>
        <hr>
        <br>
        @if(\Auth::check())
            <form method="post" action="{!! route('comments.add') !!}">
                {!! csrf_field() !!}
                <input type="hidden" value="{{$article->id}}" name="article_id">
                <p>Комментарий:<br>
                    <textarea class="form-control" name="comment"></textarea></p>
                <br>
                <button type="submit" class="btn btn-success" style="cursor:pointer;">Добавить комментарий</button>
            </form>
        @endif
        </div>
    </article>

@stop