@extends('layouts.main')

@section('content')
<div class="container-fluid">
  @csrf
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Certificado Pagos</h1>
    <p class="mb-4"Panel de administracion <strong>Firmas - Logos</strong> Certificado de pagos de la FAC</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Pagos</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>id</th>
                <th>url</th>
                <th>tipo</th>
                <th>cedula</th>
                <th>grado</th>
                <th>nombre</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($Pagos as $Pago)
                <tr>
                  <td>{{$Pago['id']}} </td>
                   @php
                        $img= $Pago['url'];
                    @endphp
                  <td><img src="{{ asset('storage/pago/'.$img) }}" width="200px" alt=""></td>
                  <td>{{$Pago['tipo']}} </td>
                  <td>{{$Pago['cedula']}} </td>
                  <td>{{$Pago['grado']}} </td>
                  <td>{{$Pago['nombre']}} </td>
                  <td>
                    @php
                        $url= $Pago['id'];
                    @endphp
                  <a href="{{ url('Admin/Pago/editar/'.$url) }}" class="btn btn-warning btn-icon-split">
                      <span class="icon text-white-50">
                          <i class="fas fa-exclamation-triangle"></i>
                      </span>
                      <span class="text">Editar</span>
                  </a>
                  </td>
                  <td>
                  <a  href="{{url('/admin/Pago/delete/'.$Pago['id'])}}" class="btn btn-danger btn-icon-split">
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