<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initialscale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ubah Data</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('mhs.update',$mhs->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="font-weightbold">NAMA</label>
                            <input type="text" class="formcontrol @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $mhs->nama) }}" placeholder="Masukkan Nama">
                            <!-- error message untuk nama -->
                            @error('nama')
                            <div class="alert alertdanger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weightbold">NIM</label>
                            <input type="text" class="formcontrol @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim', $mhs->nim) }}" placeholder="Masukkan NIM">
                            <!-- error message untuk NIm -->
                            @error('nim')
                            <div class="alert alertdanger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weightbold">JURUSAN</label>
                            <input type="text" class="formcontrol @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan', $mhs->jurusan) }}" placeholder="Masukkan Jurusan">
                            <!-- error message untuk jurusan -->
                            @error('jurusan')
                            <div class="alert alertdanger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weightbold">ALAMAT</label>
                            <textarea class="form-control
                            @error('alamat') is-invalid @enderror" name="alamat" rows="5" placeholder="Masukkan Alamat">{{ old('alamat', $mhs->alamat) }}</textarea>
                            <!-- error message untuk alamat -->
                            @error('alamat')
                            <div class="alert alertdanger mt-2"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-group"> <label class="font-weightbold">GAMBAR</label>
                        <input type="file" class="formcontrol" name="image">
                    </div>
                    <button type="submit" class="btn btnmd btn-primary">UPDATE</button>
                    <button type="reset" class="btn btnmd btn-warning">RESET</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script> 
CKEDITOR.replace( 'alamat' );
</script>
</body>
</html>