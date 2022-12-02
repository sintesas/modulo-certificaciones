

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <?php echo csrf_field(); ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Certificado Cargos</h1>
    <p class="mb-4">Panel de administracion <strong>Firmas - Logos</strong> Certificado de Cargos de la FAC</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Cargos</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>id</th>
                <th>firma</th>
                <th>tipo</th>
                <th>cedula</th>
                <th>grado</th>
                <th>nombre</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            
            <tbody>
                <?php $__currentLoopData = $Cargos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Cargo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($Cargo['id']); ?> </td>
                  <?php
                        $img= $Cargo['url'];
                    ?>
                  <td><img src="<?php echo e(asset('storage/cargo/'.$img)); ?>" width="200px" alt=""></td>
                  <td><?php echo e($Cargo['tipo']); ?> </td>
                  <td><?php echo e($Cargo['cedula']); ?> </td>
                  <td><?php echo e($Cargo['grado']); ?> </td>
                  <td><?php echo e($Cargo['nombre']); ?> </td>
                  <td>
                    <?php
                        $url= $Cargo['id'];
                    ?>
                  <a href="<?php echo e(url('Admin/Cargo/editar/'.$url)); ?>" class="btn btn-warning btn-icon-split">
                      <span class="icon text-white-50">
                          <i class="fas fa-exclamation-triangle"></i>
                      </span>
                      <span class="text">Editar</span>
                  </a>
                  </td>
                  <td>
                  <a  href="<?php echo e(url('/admin/Cargo/delete/'.$Cargo['id'])); ?>" class="btn btn-danger btn-icon-split">
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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cms\resources\views/cargo/list.blade.php ENDPATH**/ ?>