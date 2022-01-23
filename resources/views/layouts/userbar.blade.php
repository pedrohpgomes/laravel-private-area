<div class="container-fluid">
    <div class="row bg-dark text-white py-2">
        <div class="col-6">
            [APPLICATION]
        </div>
        <div class="col-6 text-end">
            {{session('usuario')->usuario}} | <a href="{{route('logout')}}">Logout</a>
        </div>
    </div>
</div>{{-- container-fluid --}}