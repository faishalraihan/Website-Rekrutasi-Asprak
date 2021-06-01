@extends('layout.app-aslab')

@section('title','Data Asprak')

@section('content')

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h1 class="display-4">Data Akun</h1>
        <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
    </div>
</div>

<div class="container-fluid px-5 mb-5">
    <table id="tabel" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>E-Mail</th>
                <th>Tanggal Register</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($list_asprak as $a)
            <tr>
                <td>{{ $a->nim }}</td>
                <td>{{ $a->name }}</td>
                <td>{{ $a->email }}</td>
                <td>{{ $a->created_at }}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection