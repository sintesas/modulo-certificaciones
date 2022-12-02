



<?php $__env->startSection('content'); ?>

<div class="container-fluid">



    <!-- Page Heading -->

    <?php if($id == null): ?>

    <h1 class="h3 mb-4 text-gray-800">Crear Firmas - Certificado de Cargos</h1>

    <?php else: ?>

    <h1 class="h3 mb-4 text-gray-800">Actualizar Firmas - Certificado de Cargos</h1>

    <?php endif; ?>

    



    <div class="row">



      <div class="col-lg-12">



        <!-- Circle Buttons -->

        <div class="card shadow mb-4">

          <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">Insertar</h6>

          </div>

          <div class="card-body">

            <?php if($id == null): ?>

            <form method="POST" action="<?php echo e(url('/admin/Cargo/create')); ?>"  accept-charset="UTF-8" enctype="multipart/form-data">

            <?php else: ?>

            <form method="POST" action="<?php echo e(url('/admin/Cargo/update/'.$id)); ?>"  accept-charset="UTF-8" enctype="multipart/form-data">

            <?php endif; ?>

            

              <?php echo csrf_field(); ?>

            <div class="form-group"> 
              <label>imagen</label>
              <br>
                  <input name="file" type="file" accept="image/gif,image/jpeg,image/jpg,image/png">
            </div> 

            <div class="form-group">

                <label for="exampleFormControlSelect1">tipo</label>

                <select name="tipo" class="form-control" id="exampleFormControlSelect1" >

                  <?php if($Cargos == null): ?>

                  <?php else: ?>

                  <option value="<?php echo e($Cargos['tipo']); ?>"><?php echo e($Cargos['tipo']); ?></option>

                  <?php endif; ?>

                  <option value="logo">logo</option>

                  <option value="firma">firma</option>

                </select>

              </div>

              <div class="form-group"> 
              <label>cedula</label>
              <br>
                  <input class="form-control" name="cedula" type="number" required>
            </div> 

            </div>

     

            <?php if($id == null): ?>

            <button type="submit" class="btn btn-primary">Crear Cargo</button>

            <?php else: ?>

            <button type="submit" class="btn btn-success">Actualizar Cargo</button>

            <?php endif; ?>

            

          </form>

        </div>

      </div>





    </div>



  </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cms\resources\views/cargo/create.blade.php ENDPATH**/ ?>