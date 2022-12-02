@extends('layouts.main')

@section('content')
<div class="container-fluid">
  @csrf
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Lista de usuarios Creados</h1>
    <p class="mb-4">Panel de administración <strong>Usuarios</strong></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Usuarios</h6>
      </div>
      <div class="card-body">
      <form action="/Admin/usuarios/buscar "  method="get" >
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <input type="text" class="form-control" name= "email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo">
            </div>
          </div>
          <div class="col-md-2">
            <button type="submit" class="btn btn-success">Buscar</button>
          </div>
      </form>
          <div class="col-md-2">
            <a href="/Admin/usuarios/list" class="btn btn-danger">Cancelar</a>
          </div>
      </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>id</th>
                <th>Cedula</th>
                <th>Correo</th>
                <th>role</th>
                <th>Editar Role</th>
                <th>Eliminar</th>
              </tr>
            </thead>
           
            <tbody>
                @foreach ($users as $item)
                <tr>
                  <td>{{$item['id']}} </td>
                  <td>{{$item['name']}} </td>
                  <td>{{$item['email']}} </td>
                  @if ($item['role'] == true)
                  <td>administrador</td>              
                  @endif
                  @if ($item['role'] == false)
                  <td>usuario</td>              
                  @endif
                
                  <td>
                    @php
                        $url= $item['id'];
                    @endphp
                    <a href="{{ url('Admin/usuarios/editar/'.$url) }}" class="btn btn-warning btn-icon-split">
                      <span class="icon text-white-50">
                          <i class="fas fa-exclamation-triangle"></i>
                      </span>
                      <span class="text">Editar</span>
                    </a>
                    </td>
                  <td>
                  <a  href="{{url('/admin/usuarios/delete/'.$item['id'])}}" class="btn btn-danger btn-icon-split">
                  <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                      </span>
                      <span class="text">Eliminar</span>
                  </a>
                  </td>
                </tr>  
                @endforeach              
            </tbody>
          </table>
        </div>
        {{ $users->links() }}
      </div>
    </div>
</div>
@endsection

@section('scriptsFotter')
  <script>
 

  function  eliminar(id) {

      var ruta = $('#eliminarArticulo').attr('ruta');
      var url = ruta+"/"+id;
    //   alert(url)

      $.ajax({
          type: "POST",
          url: url,
          data: {
            _token: "{{ csrf_token() }}",
            id:id},
          dataType: 'json',
          success : function (result) {
            alert(result.message);
            location.reload();
          }
      });

  }
</script>

@endsection

