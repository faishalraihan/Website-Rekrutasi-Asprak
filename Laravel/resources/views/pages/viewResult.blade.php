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
                <th>Nilai</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{dd($test)}} --}}
            @foreach($test as $a)
            @if ($a->nilai > 75)
            <tr style="background-color: rgb(144, 220, 144)">
                @else
            <tr style="background-color: rgb(226, 109, 109)">
                @endif
                <td>{{ $a->email }}</td>
                <td>{{ $a->name }}</td>
                <td>{{ $a->nimPendaftar }}</td>
                <td>{{ $a->pilihan_praktikum }}</td>
                <td>{{ $a->created_at }}</td>
                <td class="text-left">
                    {{$a->nilai}}
                </td>
                <td>
                    @if ($a->nilai > 75)
                    <b>LULUS</b>
                    @else
                    <b>TIDAK LULUS</b>
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection