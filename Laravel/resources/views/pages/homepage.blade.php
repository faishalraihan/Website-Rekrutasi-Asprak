@extends('layout.app')

@section('title','Web Rekrutasi Asprak')

@section('content')
<header>
    <div class="container text-center">
        <h1 class="mb-3">Rekruitasi Asprak</h1>
        <p class="lead">Selamat datang di Website Rekruitasi Asisten Praktikum IF LAB</p>
        <a href="{{route('daftar-asprak')}}" class="btn btn-info" style="font-size: 20px;width: 50%">Daftar
            Asprak</a>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" style="bottom: 0;">
        <polygon fill="white" points="0,100 100,0 100,100"/>
    </svg>
</header>

<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
</div>

<div class="container mx-auto">
    <h2 class="text-center pb-5">Alur Pendaftaran</h2>
    <div class="row">
        <div class="col-sm-4 text-center">
            <img src="{{url('img/upload.png')}}" class="img-responsive" style="width:30%"
                alt="Icon by xnimrodx in Flaticon">
            <h3 class="text-center">Upload Berkas</h3>
        </div>
        <div class="col-sm-4 text-center">
            <img src="{{url('img/test.png')}}" class="img-responsive" style="width:30%"
                alt="Icon by xnimrodx in Flaticon">
            <h3 class="text-center">Tes Tulis</h3>
        </div>
        <div class="col-sm-4 text-center">
            <img src="{{url('img/interview.png')}}" class="img-responsive" style="width:30%"
                alt="Icon by xnimrodx in Flaticon">
            <h3 class="text-center">Interview</h3>
        </div>
    </div>
</div>

<!-- <div class="container mx-auto">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://www.kaplanhecker.com/sites/default/files/styles/biography_profile/public/Sean_Hecker.jpg?itok=v3wH6WLn"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Upload Berkas</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://www.kaplanhecker.com/sites/default/files/styles/biography_profile/public/Sean_Hecker.jpg?itok=v3wH6WLn"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Tes</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://www.kaplanhecker.com/sites/default/files/styles/biography_profile/public/Sean_Hecker.jpg?itok=v3wH6WLn"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Interview</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

<div class="home" style="height: 500px;">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" style="top: 0;">
        <polygon fill="white" points="0,100 100,0 100,100" transform="scale(1, -1) translate(0, -100)"/>
    </svg>
    <div class="container text-center" style="padding: 50px 0 0 0; color: white;">
        <h1 class="pt-5">Mata Kuliah</h1>
        <p class="lead">Daftar Praktikum di Laboratorium IF</p>
    </div>
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center" style="width: 18rem; height: 8rem">
                    <div class="card-body">
                        <h5 class="card-title text-center">DIPL</h5>
                        <p class="card-text">RPL: Desain dan Implementasi Perangkat Lunak</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center" style="width: 18rem; height: 8rem">
                    <div class="card-body">
                        <h5 class="card-title text-center">JRK</h5>
                        <p class="card-text">Jaringan Komputer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center" style="width: 18rem; height: 8rem">
                    <div class="card-body">
                        <h5 class="card-title text-center">PBO</h5>
                        <p class="card-text">Pemrograman Berorientasi Objek</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" style="bottom: 0;">
        <polygon fill="white" points="0,100 100,0 100,100"/>
    </svg>
</div>

<div class="container mx-auto">
    <h2 class="text-center pb-5">Apa sih Keuntungan jadi Asisten Praktikum?</h2>
    <div class="row mb-5">
        <div class="col-sm-4 text-center">
            <img src="{{url('img/honor.png')}}" class="img-responsive" style="width:30%"
                alt="Icon by xnimrodx in Flaticon">
            <h3 class="text-center">Honor</h3>
            <p>Dapatkan Honor per Jam nya untuk menambah isi Dompet Kalian.</p>
        </div>
        <div class="col-sm-4 text-center">
            <img src="{{url('img/tak.png')}}" class="img-responsive" style="width:30%"
                alt="Icon by xnimrodx in Flaticon">
            <h3 class="text-center">TAK</h3>
            <p>TAK yang diperlukan untuk Lulus S1 IF adalah 60, menjadi Asprak maka kalian akan mendapatkan +15 Poin
                TAK.</p>
        </div>
        <div class="col-sm-4 text-center">
            <img src="{{url('img/certificate.png')}}" class="img-responsive" style="width:30%"
                alt="Icon by xnimrodx in Flaticon">
            <h3 class="text-center">Certificate</h3>
            <p>Tambah pengalaman di portfolio kalian dengan menggunakan Sertifikat yang kami berikan.</p>
        </div>
    </div>
</div>


{{-- <div class="container mb-5">
    <div class="row">
        <div class="col-md-12 text-center">
            
        </div>
    </div>
</div> --}}
@endsection