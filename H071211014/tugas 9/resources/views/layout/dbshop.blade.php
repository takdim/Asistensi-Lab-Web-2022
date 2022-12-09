<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<style>
.sidebar{
    width:10%;
    position: relative;
    right:250px;
    height:530px;

}
</style>
<body>
    <div class="row justify-content-center">
    <h4 class="bg-primary col-12 pt-2 ps-3" style="height:50px";>Database Mahasiswa sistem informasi</h4>
   <div class="col-6 sidebar bg-warning ">
        <a href="/shop" class="btn btn-primary mt-4">Registration</a>
        <a href="/showdata"class="btn btn-primary mt-3 ms-2">Database</a>
    </div>
   <div class="col-6">
    <div class="container card mt-5" style="width:100%;">
                @if (session()->get('success'))
                <div class=" mt-3 alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <th scope="row">{{$row->id}}</th>
                            <td>{{$row->nama}}</td>
                            <td>{{$row->jenis}}</td>
                            <td colspan="2">
                                <a  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$row->id}}">
                                    Update
                                </a>
            
                                <a type="button" href="/delete/{{$row->id}}"class="btn btn-warning mt-2" onclick="return confirm('Yakin hapus data?')">Deleted</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  {{$data->links()}}
            </div>
        </div>
    </div>
    

    @foreach ($data as $row)
    <div class="modal fade" id="exampleModal-{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Update form</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/edit/{{ $row->id }}" method="post">
                    @csrf
                
                  <input type="text" name="nama" placeholder="nama"value="{{$row->nama}}">
                  <input type="text" name="jenis" placeholder="alamat"value="{{$row->jenis}}">
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class ="btn btn-primary">Update</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 
</body>
</html>