@extends('app')

@section('content')
    <div class="container">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Profil</h3>
                </div>
                <div class="card-body profile-show">
                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="" width="100">
                    <div class="row">
                        <div class="col-4">
                            <p>Nama</p>
                        </div>
                        <div class="col-8">: {{ Auth::user()->name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>ID member</p>
                        </div>
                        <div class="col-8">: {{ Auth::user()->id_member }}</div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Tanggal Pendaftaran</p>
                        </div>
                        <div class="col-8">: {{ Auth::user()->created_at->toDateString() }}</div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Alamat</p>
                        </div>
                        <div class="col-8">: {{ Auth::user()->address }}</div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Pekerjaan</p>
                        </div>
                        <div class="col-8">: {{ Auth::user()->job }}</div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p>Jenis Kelamin</p>
                        </div>
                        <div class="col-8">: {{ Auth::user()->gender }}</div>
                    </div>
                    <a href="#" class="btn btn-success btn-edit-profile">Edit</a>
                </div>
                <form action="{{ route('profile.update') }}" method="post">
                    @csrf
                    <div class="card-body profile-edit">
                        @if(session('errors'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Something it's wrong:
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for=""><strong>Nama Lengkap</strong></label>
                            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for=""><strong>ID Member</strong></label>
                            <input type="text" name="id_member" class="form-control" placeholder="ID Member" value="{{ Auth::user()->id_member }}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Tanggal Pendaftaran</strong></label>
                            <input type="text" name="created_at" class="form-control" placeholder="Tanggal Pendaftaran" value="{{ Auth::user()->created_at->toDateString() }}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Alamat</strong></label>
                            <input type="text" name="address" class="form-control" placeholder="Alamat" value="{{ Auth::user()->address }}" required>
                        </div>
                        <div class="form-group">
                            <label for=""><strong>Pekerjaan</strong></label>
                            <input type="text" name="job" class="form-control" placeholder="Pekerjaan" value="{{ Auth::user()->job }}">
                        </div>
                        <p><strong>Jenis Kelamin</strong></p>
                        <div class="d-block">
                            <input type="radio" name="gender" value="P" id="r1" {{ isset(Auth::user()->gender) &&  Auth::user()->gender == 'P' ? 'checked' : '' }}><label for="r1"><p class="d-inline mx-3">Perempuan</p></label>
                            <input type="radio" name="gender" value="L" id="r2" {{ isset(Auth::user()->gender) &&  Auth::user()->gender == 'L' ? 'checked' : '' }}><label for="r2"><p class="d-inline mx-3">Laki-laki</p></label>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger float-right btn-batal-edit-profile">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(".profile-edit").hide()

    $(".btn-edit-profile").click(function(){
        $(".profile-show").hide()
        $(".profile-edit").show()
    })

    $(".btn-batal-edit-profile").click(function(){
        $(".profile-show").show()
        $(".profile-edit").hide()
    })
</script>
@endsection