@extends('layout.app')

@section('title','Test Tulis')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h1 class="display-4">Tes Tulis Rekrutasi Asprak</h1>
        <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
    </div>
</div>

<div class="container-fluid px-5 mb-5">
    <div class="row">
        <div class="col-md-9 pl-5 mb-5">
            <h2>Soal Tes Tulis Mata Kulliah Web Programming</h2>
            <table class="mb-5">
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
            <form>
                <div class="mb-3">
                    <label for="soaltest" style="font-weight: bold" class="form-label">Soal Test</label>
                    <div class="mb-4 soaltest py-3 px-3" style="background-color: #f4f4f4;border-radius: 10px">
                        <table>
                            <tr>
                                <td>1. &ThickSpace;</td>
                                <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure, aut sint doloribus
                                    quae,
                                    atque ipsum eveniet commodi debitis alias minima suscipit nam eaque praesentium et
                                    repellat exercitationem tempore ipsa hic?</td>
                            </tr>
                            <tr>
                                <td>2. &ThickSpace;</td>
                                <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure, aut sint doloribus
                                    quae,
                                    atque ipsum eveniet commodi debitis alias minima suscipit nam eaque praesentium et
                                    repellat exercitationem tempore ipsa hic?</td>
                            </tr>
                            <tr>
                                <td>3. &ThickSpace;</td>
                                <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure, aut sint doloribus
                                    quae,
                                    atque ipsum eveniet commodi debitis alias minima suscipit nam eaque praesentium et
                                    repellat exercitationem tempore ipsa hic?</td>
                            </tr>
                        </table>
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