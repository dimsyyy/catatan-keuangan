@extends('induk.body')
@section('title', 'Dashboard')

@section('isi')
    <div class="logout">
        <a href="/logout">Keluar</a>
    </div>
    <div class="wrap">
        <div class="user">
            <div class="userimg">
                <i class="fa-solid fa-circle-user"></i>
            </div>
            <div class="username">
                <h1>Hi, {{ session('user')->nama }}</h1>
                <p>{{ \Carbon\Carbon::now()->format('d M Y') }}</p>
            </div>
        </div>

        <div class="tabungan">
            <h1>Keuangan (IDR)</h1>
            <p>Rp. {{ number_format($balance, 0, ',', '.') }}</p>
            {{-- <p>Rp. {{ $balance }}</p> --}}

        </div>

    </div>

    <div class="aksi">
        <div class="btn-aksi">
            <button class="kiri" onclick="popup()">(+)Tambah Pemasukan</button>
            <button class="kanan" onclick="popup()">(-)Tambah Pengeluaran</button>
        </div>
    </div>

    <div class="riwayat">
        <h1><i class="fa-solid fa-clock-rotate-left"></i> Riwayat</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @foreach ($transaksi as $transaksis)
            <div class="list-riwayat">
                <div class="riwayat-item">
                    <p class="judul">{{ \Carbon\Carbon::parse($transaksis->tanggal)->format('d M Y') }}</p>
                    <p>{{ $transaksis->keterangan }}</p>
                </div>
                <div class="riwayat-jumlah">
                    <p>Rp. {{ number_format($transaksis->jumlah, 0, ',', '.') }}</p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- POP UP --}}
    <div class="form-popup" id="popup">
        <div class="btn-close" id="close">
            <button onclick="closePopup()"><i class="fa-solid fa-x"></i></button>
        </div>
        <form action="/addtransaksi" method="post" class="form-container">
            @csrf
            <h2>Tambah Transaksi</h2>

            <label for="jumlah"><b>Jumlah :</b></label>
            <div class="input-group">
                <i class="fa-solid fa-rupiah-sign"></i>
                <input type="number" placeholder="Masukkan Jumlah" name="jumlah" required>
            </div>
            <br>
            <label for="keterangan"><b>Keterangan :</b></label>
            <div class="input-group">
                <i class="fa-solid fa-notes-medical"></i>
                <input type="text" placeholder="Masukkan Keterangan" name="keterangan" required>
            </div>
            <br>
            <label><b>Tipe</b></label>
            <div class="radio-group">
                <input type="radio" id="pemasukan" name="tipe" value="pemasukan" required>
                <label for="pemasukan">Pemasukan</label>
                <input type="radio" id="pengeluaran" name="tipe" value="pengeluaran" required>
                <label for="pengeluaran">Pengeluaran</label>
            </div>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
@endsection
