@extends('layout.app-aslab')

@section('title','Test Tulis')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h1 class="display-4">Tes Tulis Rekrutasi Asprak</h1>
        <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
    </div>
</div>
<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
</div>
<div class="container-fluid px-5 mb-5">

    <div class="row">
        <div class="col-md-9 pl-5 mb-5">
            <h2 class="mb-4">Buat Soal Test</h2>
            <form method="POST" action="{{ route('soals.store') }}">
                @csrf
                <div class="mb-3">

                    <label for="nimPembuat"><b>Aslab Pembuat Soal</b></label>
                    <div class="form-row mb-3">
                        <div class="col">
                            <label for="nim">Nama</label>
                            <input type="text" class="form-control" placeholder="First name" value="{{ $data['name']}}"
                                disabled>
                        </div>
                        <div class="col">
                            <label for="nim">NIM</label>
                            <input name="nimPembuat" type="text" class="form-control" placeholder="Last name"
                                value="{{ $data['nim']}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="matkul"><b>Pilihan Mata Kuliah</b></label>
                        <select class="form-control" id="matkul" name="matkul">
                            <option selected>Open this select menu</option>
                            <option value="dap">DAP</option>
                            <option value="appl">APPL</option>
                            <option value="webpro">Website Programming</option>
                            <option value="std">Struktur Data</option>
                            <option value="pbo">Pemrograman Berbasis Object</option>
                            <option value="sister">Sistem Paralel dan Terdistribusi</option>
                            <option value="pbd">Pemodelan Basis Data</option>
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="soal"><b>Soal</b></label>
                        <textarea class="form-control" id="soal" name="soal" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="kunciJawaban"><b>Jawaban</b></label>
                        <textarea class="form-control" id="kunciJawaban" name="kunciJawaban" rows="10"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
        <div class="col-md-3">
            {{-- <div class="card">
                <div class="card-header">
                    Nomor Soal
                </div>
                <div class="card-body">
                    <a type="button" class="card-title btn btn-primary">1</a>
                    <a type="button" class="card-title btn btn-outline-primary">2</a>
                    <a type="button" class="card-title btn btn-primary">3</a>
                    <a type="button" class="card-title btn btn-outline-primary">4</a>
                    <a type="button" class="card-title btn btn-primary">5</a>
                    <a type="button" class="card-title btn btn-outline-primary">6</a>
                    <a type="button" class="card-title btn btn-primary">7</a>
                    <a type="button" class="card-title btn btn-outline-primary">8</a>
                    <a type="button" class="card-title btn btn-primary">9</a>
                    <a type="button" class="card-title btn btn-outline-primary">10</a>
                </div>
            </div> --}}
            <div class="time-remaining mt-3 sticky-top">
                <p class="text-center mb-0 text-primary">Sisa Waktu</p>
                <h1 class="text-center text-primary" id="demo">-- : --</h1>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- 
@push('add-js')
<script>
    // Mengatur waktu akhir perhitungan mundur
    var countDownDate = new Date();
    countDownDate.setMinutes(countDownDate.getMinutes() + 1);
    countDownDate = new Date(countDownDate);

    // Memperbarui hitungan mundur setiap 1 detik
    var x = setInterval(function () {

        // Untuk mendapatkan tanggal dan waktu hari ini
        var now = new Date().getTime();

        // Temukan jarak antara sekarang dan tanggal hitung mundur
        var distance = countDownDate - now;

        // Perhitungan waktu untuk hari, jam, menit dan detik
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Keluarkan hasil dalam elemen dengan id = "demo"
        document.getElementById("demo").innerHTML = hours + ":" +
            minutes + ":" + seconds;

        // Jika hitungan mundur selesai, tulis beberapa teks 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "TIME'S UP";
        }
    }, 1000);
</script>
@endpush --}}