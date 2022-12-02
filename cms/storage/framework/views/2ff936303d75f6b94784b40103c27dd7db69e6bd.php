<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Fuerza Aérea Colombiana- Certificaciones en Línea</title>

  <!-- Custom fonts for this template-->
  <script src="<?php echo e(asset('/main/js/jquery-3.5.1.js')); ?>" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <link href="<?php echo e(asset('/main/vendor/fontawesome-free/css/all.min.css')); ?>" type="text/css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo e(asset('/main/css/sb-admin-2.min.css')); ?>" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  
  
  
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(url('/admin')); ?>" style="margin-top: 20px; margin-bottom: 20px;">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-info-circle"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Fuerza Aérea Colombiana</div>
      </a>
      <!-- Heading -->
      <div class="sidebar-heading">
        Panel de Control
      </div>
      
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-cog"></i>
          <span>Certificado laboral</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Administrar</h6>
            <a class="collapse-item" href="<?php echo e(url('/Admin/Laboral/listar')); ?>">Listar</a>
            <a class="collapse-item" href="<?php echo e(url('/Admin/Laboral/crear')); ?>">Crear Logo - Firma</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Certificado Tiempo</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Administrar</h6>
            <a class="collapse-item" href="<?php echo e(url('/Admin/Tiempo/listar')); ?>">Listar</a>
            <a class="collapse-item" href="<?php echo e(url('/Admin/Tiempo/crear')); ?>">Crear Logo - Firma</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTree" aria-expanded="falsa" aria-controls="collapseTree">
          <i class="fas fa-fw fa-cog"></i>
          <span>Certificado Cargos</span>
        </a>
        <div id="collapseTree" class="collapse " aria-labelledby="headingTree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Administrar</h6>
            <a class="collapse-item" href="<?php echo e(url('/Admin/Cargo/listar')); ?>">Listar</a>
            <a class="collapse-item" href="<?php echo e(url('/Admin/Cargo/crear')); ?>">Crear Logo - Firma</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="falsa" aria-controls="collapseFour">
          <i class="fas fa-fw fa-cog"></i>
          <span>Desprendible Pago</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Administrar</h6>
            <a class="collapse-item" href="<?php echo e(url('/Admin/Pago/listar')); ?>">Listar</a>
            <a class="collapse-item" href="<?php echo e(url('/Admin/Pago/crear')); ?>">Crear Logo - Firma</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="falsa" aria-controls="collapseFive">
          <i class="fas fa-fw fa-cog"></i>
          <span>Usuarios</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo e(url('/Admin/usuarios/list')); ?>">Listar</a>
          </div>
        </div>
      </li>
    

      <!-- Divider -->
      <hr class="sidebar-divider">

      

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <div class="container">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                  <button type="submit " class="btn btn-primary btn-lg btn-block">Cerrar sesión.</button>
            </form>
            </div>
        </div>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <?php echo $__env->yieldContent('scriptsFotter'); ?>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo e(asset('/main/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo e(asset('/main/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo e(asset('/main/js/sb-admin-2.min.js')); ?>"></script>

   <!-- Page level plugins -->
   <script src="<?php echo e(asset('/main/vendor/chart/Chart.min.js')); ?>"></script>

   <!-- Page level custom scripts -->
   <script src="<?php echo e(asset('/main/js/demo/chart-area-demo.js')); ?>"></script>
   <script src="<?php echo e(asset('/main/js/demo/chart-pie-demo.js')); ?>"></script>

   

</body>

</html>
<?php /**PATH C:\Apache24\htdocs\resources\views/layouts/main.blade.php ENDPATH**/ ?>