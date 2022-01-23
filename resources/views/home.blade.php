@extends('layouts.app_layout')

@section('content')
<div>
    <h3>
        conteudo da aplicação
    </h3>
</div>

<div>
    <h3>Upload de arquivo</h3>
    <form action="{{route('main_upload')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="arquivo">
        <input type="submit" value="Upload">
    </form>
</div>

<div>
    <img src="{{asset('storage/images/novo.jpg')}}" alt="novo.jpg">
</div>


@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif


@endsection