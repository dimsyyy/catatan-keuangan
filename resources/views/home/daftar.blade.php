@extends('induk.body')
@section('title','Daftar')

<div class="container">
    <h1 class="sitename">Budget Aura</h1>
    <p class="desk">Budget Aura adalah aplikasi web pencatat keuangan!</p>

    <form action="/registeraction" method="POST">
        @csrf
        <div class="formgrup">
            <div class="inputgrup">
                <div class="icon">
                    <i class="fa-regular fa-user"></i>
                </div>
                <input type="text" name="name" placeholder="Nama Lengkap" required autofocus>
            </div>
            <div class="inputgrup">
                <div class="icon">
                    <i class="fa-regular fa-envelope"></i>
                </div>
                <input type="email" name="email" placeholder="emailkamu@gmail.com" required>
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

            <div class="formsubmit">
                <button><i class="fa-solid fa-user-plus"></i> Daftar</button>
                <span style="color: white; margin-left: 5px;"> | </span><a href="/login">Login</a>
            </div>
        </div>
    </form>

</div>