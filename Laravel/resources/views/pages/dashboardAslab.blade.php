@extends('layout.app-aslab')

@section('title','My Dashboard')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h1 class="display-4">My Dashboard</h1>
        <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
    </div>
</div>

<div class="container-fluid px-5 mb-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="border: none;">
                <img src="https://www.kaplanhecker.com/sites/default/files/styles/biography_profile/public/Sean_Hecker.jpg?itok=v3wH6WLn"
                    class="card-img-top" style="width: 100%;">
                <div class="card-body pl-0 pr-0 py-0">
                    <p class="card-text text-center py-2"
                        style="font-weight: bold;color: #425292;background-color: #FFE600;">
                        ASISTEN LABORATORIUM</p>
                </div>
                <div class="mt-3">
                    <a href="{{url('/editProfileAslab/'.$data->nim.'/edit')}}" class="btn btn-info"
                        style="border-radius: 0;width: 100%;background-color: #425292 ;">Edit Profile</a>
                </div>
                <!-- <div class="mt-3">
                        <a href="#" class="btn btn-outline-info" style="border-radius: 0;width: 48%;">Lihat Hasil
                            Seleksi</a>
                        <a href="#" class="btn btn-outline-info float-right" style="border-radius: 0;width: 48%;">Lihat
                            Nilai
                            Seleksi</a>
                    </div> -->
            </div>
        </div>
        <div class="col-md-6 pl-5">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <h2>{{$data->name}}</h2>
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20px;">
                            <h6>NIM </h6>
                        </td>
                        <td>
                            <h6>: {{$data->nim}}</h6>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20px;">
                            <h6>Email </h6>
                        </td>
                        <td>
                            <h6>: {{$data->email}}</h6>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20px;">
                            <h6>Jurusan</h6>
                        </td>
                        <td>
                            <h6>: {{$data->jurusan}}</h6>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20px;">
                            <h6>Angkatan</h6>
                        </td>
                        <td>
                            <h6>: {{$data->angkatan}}</h6>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20px;">
                            <h6>Kode</h6>
                        </td>
                        <td>
                            <h6>: {{$data->kode}}</h6>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-3 pl-5">
            <div class="row">
                <div class="col-md-5">
                    <a href="{{route('soals.index')}}" class="btn btn-outline-info"
                        style="border-radius: 0.7; width: 100px">Soal</a>
                </div>
                <div class="col-md-5">
                    <a href="{{ route('listPendaftar') }}" class="btn btn-outline-info float-right"
                        style="border-radius: 0.7; width: 100px">Pendaftar</a>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-md-5">
                    <a href="{{route('viewResult')}}" class="btn btn-outline-info"
                        style="border-radius: 0.7; width: 100px">Hasil</a>
                </div>
                <div class="col-md-5">
                    <a href="{{route('listAsprak')}}" class="btn btn-outline-info float-right"
                        style="border-radius: 0.7; width: 100px">Akun</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection