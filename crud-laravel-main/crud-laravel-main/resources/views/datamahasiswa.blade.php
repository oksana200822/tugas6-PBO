<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Tugas PBO CRUD Laravel</title>
  </head>

    <!--Style-->
    <style>
      .container-fluid {
        width: 1450px;
        background-color: #FFFAFA;
        margin: 40px auto;
        padding: 30px;
        border: 4px solid #eaeaea;
        border-radius: 20px;
        box-sizing: border-box;
        position: relative;
      }
    </style>


  <body>
    

    <div class="container-fluid">
        <h3 class="text-center">TUGAS PBO CRUD DENGAN FRAMEWORK LARAVEL</h3>
        <h4 class="text-center"><i>Created by Febri Tri Prasetyo</i></h4>
        
        <a href="/tambahmahasiswa" class="btn btn-success text-right" style="float: right;">+ Tambahkan Data</a>
        <div class="row g-3 align-items-center mb-2">
            <div class="col-auto">
                <form action="/mahasiswa" method="GET">
                    <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline" placeholder="Cari Nama">
                </form>
            </div>
        </div>
        
        <div class="row">
            <div class="card-header bg-primary text-white text-center mb-1">
                <b>TABEL DATA MAHASISWA</b>
            </div>
            <table class="table align-middle table-bordered table-hover table-responsive">
                <thead class="text-center" style="background-color: #E6E6FA;">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kota</th>
                        <th scope="col">Email</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $no = 1;
                @endphp                
                @foreach ($data as $index => $row)
                    <tr>
                        <th class="text-center" scope="row">{{$index + $data->firstItem()}}</th>
                        <td>{{$row->nama}}</td>
                        <td>{{$row->nim}}</td>
                        <td>{{$row->jenis_kelamin}}</td>
                        <td>{{$row->alamat}}</td>
                        <td>{{$row->kota}}</td>
                        <td>{{$row->email}}</td>
                        <td class="text-center">
                            <img src="{{asset('fotomahasiswa/'.$row->foto)}}" alt="" style="width: 60px;">
                        </td>
                        <td>{{$row->created_at->format('d F Y')}}</td>
                        <td class="text-center">
                            <a href="/tampilkandata/{{$row->id}}" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{$row->id}}" data-nama="{{$row->nama}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                    
                    
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    $('.delete').click(function(){
        var mahasiswaid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        
        swal({
            title: "Apakah Anda Yakin?",
            text: "Anda akan menghapus data pegawai dengan nama "+nama+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location ="/delete/"+mahasiswaid+""
                swal("Data berhasil di hapus", {
                    icon: "success",
                });
            } else {
                swal("Data tidak jadi di hapus");
            }
        });
    }); 
  </script>

  <script>
      @if (Session::has('success'))
        toastr.success("{{Session::get('success')}}")
      @endif
      
  </script>
</html>