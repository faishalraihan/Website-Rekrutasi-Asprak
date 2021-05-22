@extends('layout.app')

@section('title','Test Tulis')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h1 class="display-4">Tes Tulis Rekrutasi Asprak</h1>
        <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
    </div>
</div>
{{-- {{dd($data)}} --}}
<div class="container-fluid px-5 mb-5">
    <div class="row">
        <div class="col-md-9 pl-5 mb-5">
            <table class="mb-5">
                <tr>
                    <td style="width:180px;">Nama</td>
                    <td style="width: 30px;">:</td>
                    <td>
                        <b class="text-warning" style="text-transform: uppercase">{{$data['data']->name}}</b>
                    </td>
                </tr>
                <tr>
                    <td style="width:180px;">NIM</td>
                    <td style="width: 30px;">:</td>
                    <td>
                        <b class="text-warning" style="text-transform: uppercase">{{$data['data']->nimPendaftar}}</b>
                    </td>
                </tr>
                <tr>
                    <td style="width:180px;">Mata Kuliah</td>
                    <td style="width: 30px;">:</td>
                    <td>
                        <b class="text-primary" style="text-transform: uppercase">{{$data['data']->matkul}}</b>
                    </td>
                </tr>
                <tr>
                    <td style="width:80px;">Waktu</td>
                    <td style="width: 30px;">:</td>
                    <td> <b>60 Menit</b></td>
                </tr>
                <tr>
                    <td style="width:80px;">Tipe Soal</td>
                    <td style="width: 30px;">:</td>
                    <td> <b>Isian</b></td>
                </tr>
            </table>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="soaltest" style="font-weight: bold" class="form-label">Soal Test</label>
                    <div class="mb-4 soaltest py-3 px-3" style="background-color: #f4f4f4;border-radius: 10px">
                        {{$data['data']->soal}}
                    </div>

                    <label for="soaltest" style="font-weight: bold" class="form-label">Jawaban</label>
                    <div class="form-floating mb-5">
                        <textarea class="form-control" rows="10"
                            placeholder="Jawablah soal dengan jawaban yang benar..." id="soal1" name="soal1"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

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
@endpush