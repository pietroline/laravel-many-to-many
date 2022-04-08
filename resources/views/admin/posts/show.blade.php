@extends ("admin.layouts.base")

@section("content")
    <div class="container">

        <h1>Dettagli post</h1>

        <ul>
            <li>
                <strong>Titolo: </strong> {{$post->title}}
            </li>
            <li>
                <strong>Contenuto: </strong> {{ $post->content }}
            </li>
            <li>
                <strong>Slug: </strong> {{$post->slug}}
            </li>
            <li>
                <strong>Categoria: </strong> {{isset($post->category) ? $post->category->name : "NULL"}}
            </li>

            
        </ul>


        <a href="{{route('admin.posts.index')}}" class="btn btn-primary">Indietro</a>
    </div>
@endsection