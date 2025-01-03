@extends('induk.body')
@section('title','Login')
@section('isi')

<div class="container">
    <h1 class="sitename">Budget Aura</h1>
    <p class="desk">Budget Aura adalah aplikasi web pencatat keuangan!</p>

    @if(session('success'))
        <div class="success" style="color: white; font-size: 14px; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif
    <form action="/loginaction" method="POST">
        @csrf
        <div class="formgrup">
            <div class="inputgrup">
                <div class="icon">
                    <i class="fa-regular fa-envelope"></i>
                </div>
                <input type="email" name="email" placeholder="emailkamu@gmail.com" required autofocus>
            </div>
            <div class="inputgrup">
                <div class="icon">
                    <i class="fa-solid fa-key"></i>
                </div>
                <input type="password" name="password" placeholder="*******" required>
            </div>

            @if(session('err'))
                <div class="err" style="color: white; font-size: 14px; margin-bottom: 10px;">
                    {{ session('err') }}
                </div>
            @endif

            <div class="inputgrup">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Biarkan saya tetap masuk</label>
            </div>
            <div class="formsubmit">
                <button><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                <span style="color: white; margin-left: 5px;"> | </span><a href="/daftar">Buat Akun</a>
            </div>
        </div>

    </form>
</div>


@endsection