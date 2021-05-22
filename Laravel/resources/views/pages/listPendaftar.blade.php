@extends('layout.app-aslab')

@section('title','Data Asprak')

@section('content')

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h1 class="display-4">Data Pendaftar</h1>
        <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
    </div>
</div>

<div class="container-fluid px-5 mb-5">
    <table id="tabel" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>E-Mail</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Pilihan Praktikum</th>
                <th>Tanggal Register</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{dd($test)}} --}}
            @foreach($test as $a)
            <tr>
                <td>{{ $a->email }}</td>
                <td>{{ $a->name }}</td>
                <td>{{ $a->nimPendaftar }}</td>
                <td>{{ $a->pilihan_praktikum }}</td>
                <td>{{ $a->created_at }}</td>
                <td>
                    {{-- {{dd($a)}} --}}
                    @if ($a->status == NULL)
                    <p>Belum Test</p>
                    @else
                    <p>Sudah Test</p>
                    @endif
                </td>

                <td>
                    @if ($a->status == NULL)
                    {{-- <a href="{{route('tests.show',$a->id_test)}}">Do Test</a> --}}
                    <a class="badge badge-primary" href="{{route('editDataPendaftaran',$a->id)}}">View & Edit</a>
                    @else
                    <a href="#">See Result</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection