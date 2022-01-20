@extends('layouts.login_layout')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-sm-4 offset-sm-4">

            {{-- form --}}
            <form action="{{route('login_submit')}}" method="post" id="login">
                @csrf

                <h4>LOGIN</h4>
                <hr>

                <div class="form-group">
                    <label for="">E-mail:</label>
                    <input type="email" name='text_user' class='form-control' />
                </div>

                <div class="form-group">
                    <label for="">Password:</label>
                    <input type="password" name='text_password' class='form-control' />
                </div>

                <div class="form-group mt-3">                    
                    <input type="submit" value='Enter' class='btn btn-primary' form='login' />
                </div>

            </form>

            {{-- validated errors --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
</div>{{-- container --}}
@endsection