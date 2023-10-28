<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">BIODATA MAHASISWA</h3>
                    <h5 class="text-center"><a href="">BELAJAR LARAVEL</a></h5>         
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('mhs.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">FOTO</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">NIM</th>
                                <th scope="col">JURUSAN</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                            @forelse ($mhs as $mh)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/image/'.$mh->image) }}" class="rounded" style="width: 50px">
                                    </td>
                                    <td>{{ $mh->nama }}</td>
                                    <td>{{ $mh->nim }}</td>
                                    <td>{{ $mh->jurusan }}</td>
                                    <td>{{ $mh->alamat }}</td>
                                    <td class="text-center">
                                       <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('mhs.destroy', $mh->id) }}" method="POST">
                                       <a href="{{ route('mhs.show', $mh->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                       <a href="{{ route('mhs.edit', $mh->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>

                                    
                                    </form>
                                    
                                </tr>
                              @empty

                              @endforelse

                            </tbody>
                          </table>  
                          <!-- Fungsi paginasi masih error -->
                         

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!'); 
        @endif
    </script>


</body>
</html>

