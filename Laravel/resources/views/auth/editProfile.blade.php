@extends('layout.app')

@section('title','Daftar Asprak')

@section('content')
<div class="container daftar-asprak pb-4"
    style="margin-top: 5vh;height:fit-content;margin-bottom: 50px; background-color: rgb(192, 230, 238);border-radius: 20px;">

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

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mt-3">Edit Profil</h1>
        </div>
    </div>

    
    <form method="POST" action="{{url('/editProfile/'.$asprak->nim.'/update')}}">
        <div class="row mx-5">
            {{ csrf_field() }}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                        placeholder="Nama Lengkap" name="name" value="{{Session::get('name')}}" >
                        @if ($errors->has('name'))
                            <span class=" help-block">
                                <small style="color:rgb(255, 34, 34)">{{ $errors->first('name') }}</small>
                            </span>
                        @endif
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Masukkan Email" name="email" value="{{Session::get('email')}}" >
                    <small id="emailHelp" class="form-text text-muted">*Gunakan Email SSO</small>
                    @if ($errors->has('email'))
                        <span class=" help-block">
                            <small style="color:rgb(255, 34, 34)">{{ $errors->first('email') }}</small>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" aria-describedby="emailHelp"
                        placeholder="Masukkan NIM" name="nim" value="{{Session::get('nim')}}">
                    @if ($errors->has('nim'))
                        <span class=" help-block">
                            <small style="color:rgb(255, 34, 34)">{{ $errors->first('nim') }}</small>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <div class="input-group">
                        <select class="custom-select" id="jurusan" placeholder="Pilih Jurusan Anda"
                            name="jurusan">
                            @if ($asprak->jurusan == "Informatika")
                                <option>Pilih Jurusan Anda</option>
                                <option value="Informatika" selected >Informatika</option>
                                <option value="Teknologi Informasi">Teknologi Informasi</option>
                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                <option value="Data Science">Data Science</option>        
                            @endif
                            @if ($asprak->jurusan == "Teknologi Informasi")
                                <option >Pilih Jurusan Anda</option>
                                <option value="Informatika">Informatika</option>
                                <option value="Teknologi Informasi"selected >Teknologi Informasi</option>
                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                <option value="Data Science">Data Science</option>        
                            @endif
                            @if ($asprak->jurusan == "Rekayasa Perangkat Lunak")
                                <option >Pilih Jurusan Anda</option>
                                <option value="Informatika">Informatika</option>
                                <option value="Teknologi Informasi">Teknologi Informasi</option>
                                <option value="Rekayasa Perangkat Lunak" selected >Rekayasa Perangkat Lunak</option>
                                <option value="Data Science">Data Science</option>        
                            @endif   
                            @if ($asprak->jurusan == "Data Science")
                                <option >Pilih Jurusan Anda</option>
                                <option value="Informatika">Informatika</option>
                                <option value="Teknologi Informasi">Teknologi Informasi</option>
                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                <option value="Data Science" selected>Data Science</option>        
                            @endif   
                            
                        </select>
                    </div>

                    @if ($errors->has('jurusan'))
                    <span class=" help-block">
                        <small style="color:rgb(255, 34, 34)">{{ $errors->first('jurusan') }}</small>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                    <div class="input-group">
                        <select class="custom-select" id="angkatan" placeholder="Pilih Tahun Angkatan"
                            name="angkatan">
                            @if ($asprak->angkatan == "2018")
                                <option>Pilih Tahun Angkatan</option>
                                <option value="2018" selected >2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>    
                            @endif
                            @if ($asprak->angkatan == "2019")
                                <option>Pilih Tahun Angkatan</option>
                                <option value="2018" >2018</option>
                                <option value="2019"selected >2019</option>
                                <option value="2020">2020</option>    
                            @endif
                            @if ($asprak->angkatan == "2020")
                                <option>Pilih Tahun Angkatan</option>
                                <option value="2018" >2018</option>
                                <option value="2019">2019</option>
                                <option value="2020" selected >2020</option>    
                            @endif
                        </select>
                    </div>

                    @if ($errors->has('angkatan'))
                    <span class=" help-block">
                        <small style="color:rgb(255, 34, 34)">{{ $errors->first('angkatan') }}</small>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas Default</label>
                    <input type="text" class="form-control" id="kelas" 
                        placeholder="Ketikkan Kelas Default" name="kelas" value="{{$asprak->kelas}}">
                    @if ($errors->has('kelas'))
                    <span class=" help-block">
                        <small style="color:rgb(255, 34, 34)">{{ $errors->first('kelas') }}</small>
                    </span>
                    @endif
                </div>

            </div>
            <button type="submit" class="btn btn-info mt-4 mb-5" style="width: 100%;">Edit</button>
        </div>
    </form>

</div>
@endsection