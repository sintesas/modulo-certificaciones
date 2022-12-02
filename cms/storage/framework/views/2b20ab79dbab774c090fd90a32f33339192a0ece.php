



<?php $__env->startSection('content'); ?>

<div class="container-fluid">





    <h1 class="h3 mb-4 text-gray-800">Actualizar Role</h1>

    <div class="row">



      <div class="col-lg-12">



        <!-- Circle Buttons -->

        <div class="card shadow mb-4">

          <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">Insertar</h6>

          </div>

          <div class="card-body">

    
            <form method="POST" action="<?php echo e(url('/admin/usuarios/update/'.$id)); ?>"  accept-charset="UTF-8" enctype="multipart/form-data">

              <?php echo csrf_field(); ?>

            <div class="form-group"> 
                <select name="role"class="form-select form-control" aria-label="Default select example">
                    <option value="0">Usuario</option>
                    <option value="1">Administrador</option>
                    </select>
                </div> 

            </div>

            <button type="submit" class="btn btn-success">Actualizar Role</button>

            

          </form>

        </div>

      </div>





    </div>



  </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Apache24\htdocs\resources\views/roleuser.blade.php ENDPATH**/ ?>