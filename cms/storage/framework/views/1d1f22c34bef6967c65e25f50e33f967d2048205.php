

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <?php echo csrf_field(); ?>
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
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($item['id']); ?> </td>
                  <td><?php echo e($item['name']); ?> </td>
                  <td><?php echo e($item['email']); ?> </td>
                  <?php if($item['role'] == true): ?>
                  <td>administrador</td>              
                  <?php endif; ?>
                  <?php if($item['role'] == false): ?>
                  <td>usuario</td>              
                  <?php endif; ?>
                
                  <td>
                    <?php
                        $url= $item['id'];
                    ?>
                    <a href="<?php echo e(url('Admin/usuarios/editar/'.$url)); ?>" class="btn btn-warning btn-icon-split">
                      <span class="icon text-white-50">
                          <i class="fas fa-exclamation-triangle"></i>
                      </span>
                      <span class="text">Editar</span>
                    </a>
                    </td>
                  <td>
                  <a  href="<?php echo e(url('/admin/usuarios/delete/'.$item['id'])); ?>" class="btn btn-danger btn-icon-split">
                  <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                      </span>
                      <span class="text">Eliminar</span>
                  </a>
                  </td>
                </tr>  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
            </tbody>
          </table>
        </div>
        <?php echo e($users->links()); ?>

      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scriptsFotter'); ?>
  <script>
 

  function  eliminar(id) {

      var ruta = $('#eliminarArticulo').attr('ruta');
      var url = ruta+"/"+id;
    //   alert(url)

      $.ajax({
          type: "POST",
          url: url,
          data: {
            _token: "<?php echo e(csrf_token()); ?>",
            id:id},
          dataType: 'json',
          success : function (result) {
            alert(result.message);
            location.reload();
          }
      });

  }
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\resources\views/listuser.blade.php ENDPATH**/ ?>