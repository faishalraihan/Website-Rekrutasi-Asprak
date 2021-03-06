@extends('layout.app')

@section('title','My Dashboard')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h1 class="display-4">My Dashboard</h1>
        <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
    </div>
</div>


@if(Session::has('nim') && !$dataP)
<div class="container-fluid px-5 mb-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="border: none;">
                <img src="https://www.kaplanhecker.com/sites/default/files/styles/biography_profile/public/Sean_Hecker.jpg?itok=v3wH6WLn"
                    class="card-img-top" style="width: 100%;">
                <div class="card-body pl-0 pr-0 py-0">
                    <p class="card-text text-center py-2"
                        style="font-weight: bold;color: #425292;background-color: #FFE600;">
                        ASISTEN PRAKTIKUM</p>
                </div>
                <div class="mt-3">
                    <a href="{{url('/editProfile/'.$data->nim.'/edit')}}" class="btn btn-info"
                        style="border-radius: 0;width: 100%;background-color: #425292 ;">Edit Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 pl-5">
            <table>
                <tbody>
                    <tr>
                        <td>

                            <h2>{{ $data->name }}</h2>
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
                            @if($data->periode == NULL)
                            <h6 class="badge badge-warning">: ON RECRUITMENT PROGRESS</h6>
                            @else
                            <h6>: {{$data->kode}}</h6>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20px;">
                            <h6>Periode</h6>
                        </td>
                        <td>
                            @if($data->periode == NULL)
                            <h6 class="badge badge-warning">: ON RECRUITMENT PROGRESS</h6>
                            @else
                            <h6>: {{$data->periode}}</h6>
                            @endif
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>


@elseif ($dataP->nimPendaftar)
<div class="container-fluid px-5 mb-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="border: none;">
                <img src="https://www.kaplanhecker.com/sites/default/files/styles/biography_profile/public/Sean_Hecker.jpg?itok=v3wH6WLn"
                    class="card-img-top" style="width: 100%;">
                <div class="card-body pl-0 pr-0 py-0">
                    <p class="card-text text-center py-2"
                        style="font-weight: bold;color: #425292;background-color: #FFE600;">
                        ASISTEN PRAKTIKUM</p>
                </div>
                <div class="mt-3">
                    <a href="{{url('/editProfile/'.$dataP->nimPendaftar.'/edit')}}" class="btn btn-info"
                        style="border-radius: 0;width: 100%;background-color: #425292 ;">Edit Profile</a>
                </div>
                <div class="mt-3">
                    <a href="#" class="btn btn-outline-info" style="border-radius: 0;width: 48%;">Lihat Hasil
                        Seleksi</a>
                    <a href="#" class="btn btn-outline-info float-right" style="border-radius: 0;width: 48%;">Lihat
                        Nilai
                        Seleksi</a>
                </div>

            </div>
        </div>
        <div class="col-md-6 pl-5">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <h2>{{$dataP->name}}</h2>
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20px;">
                            <h6>NIM </h6>
                        </td>
                        <td>
                            <h6>: {{$dataP->nim}}</h6>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20px;">
                            <h6>Jurusan </h6>
                        </td>
                        <td>
                            <h6>: {{$dataP->jurusan}}</h6>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20px;">
                            <h6>Angkatan</h6>
                        </td>
                        <td>
                            <h6>: {{$dataP->angkatan}}</h6>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20px;">
                            <h6>Kode</h6>
                        </td>
                        <td>
                            <h6>: {{$dataP->kode}}</h6>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20px;">
                            <h6>Periode</h6>
                        </td>
                        <td>
                            <h6>: {{$dataP->periode}} <span class="badge badge-warning">GANJIL</span>
                            </h6>
                        </td>
                    </tr>

                    {{-- <tr>
                        <td style="width: 20px;">
                            <h6>TES</h6>
                        </td>
                        <td>
                            @foreach ($dataTest as $dt)
                            <h6>$dt->id_test->id_pendaftaran</h6>
                            <h6>$dt->id_test->id_test</h6>

                            @endforeach
                        </td>
                    </tr> --}}

                </tbody>
            </table>

            <h3 class="mt-5 php mb-3">Tes Tulis</h3>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="jadwal-harian mb-4">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Test</th>
                                    </tr>
                                <tbody>
                                    {{-- <td>{{dd($dataT)}}</td> --}}
                                    <?php $index = 0; ?>
                                    @foreach ($dataT as $datatest)
                                    <tr>
                                        <td style="text-transform: uppercase;font-weight: bold">
                                            {{$datatest->pilihan_praktikum}}</td>
                                        <td>
                                            @if ($datatest->status == NULL)
                                            <p class="btn btn-outline-warning">Belum Test</p>
                                            @else
                                            <p class="btn btn-primary">Sudah Test</p>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- {{dd($dataT)}} --}}
                                            @if ($datatest->status == NULL)
                                            <a href="{{route('tests.show',$datatest->id_test)}}"
                                                class="btn btn-outline-success">Kerjakan Test</a>
                                            
                                            {{-- @foreach ($dataH as $hasil) --}}
                                            @elseif ($dataH != "[]")
                                                @foreach ($dataH as $hasil)
                                                @if ($hasil->pilihan_praktikum == $datatest->pilihan_praktikum)                        
                                                        @if ($hasil->nilai > 75)
                                                        <p style="font-weight: bold" class="text-success">{{$hasil->nilai}}
                                                            |
                                                            <span class="badge badge-success">LULUS</span>
                                                        </p>
                                                        @else
                                                        <p style="font-weight: bold" class="text-danger">{{$hasil->nilai}} |
                                                            <span class="badge badge-danger">TIDAK
                                                                LULUS</span></p>
                                                        @endif
                                                @else 
                                                    {{-- <p>Menunggu Hasil</p> --}}
                                                @endif
                                                @endforeach
                                            @else
                                                <p>Menunggu Hasil</p>
                                            @endif
                                            {{-- @endforeach --}}
                                            

                                        </td>
                                    </tr>
                                    <?php $index++; ?>
                                    @endforeach

                                </tbody>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            {{-- <h5 class="mt-5 php mb-3">Jadwal Jaga</h5>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="jadwal-harian mb-4">
                            <h4 class="text-secondary">Senin</h4>
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Jam</th>
                                    </tr>
                                <tbody>
                                    <tr>
                                        <td>Web Programming</td>
                                        <td>IF-42-04</td>
                                        <td>13.30 - 16.30</td>
                                    </tr>

                                </tbody>
                                </thead>
                            </table>
                        </div>
                        <div class="jadwal-harian">
                            <h4 class="text-secondary">Rabu</h4>
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Mata Kuliah</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Jam</th>
                                    </tr>
                                <tbody>
                                    <tr>
                                        <td>Web Programming</td>
                                        <td>IF-42-04</td>
                                        <td>13.30 - 16.30</td>
                                    </tr>
                                    <tr>
                                        <td>Struktur Data</td>
                                        <td>IF-42-04</td>
                                        <td>10.30 - 13.30</td>
                                    </tr>

                                </tbody>
                                </thead>
                            </table>
                        </div>

                    </div>
                </div>
            </div> --}}
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Matkul Praktikum
                </div>
                <div class="card-body">
                    <a type="button" class="card-title w-100 btn btn-secondary">Web Programming <span
                            class="badge badge-light ml-1">2</span></a>
                    <a type="button" class="card-title w-100 btn btn-secondary">Struktur Data <span
                            class="badge badge-light ml-1">1</span></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endif




@endsection