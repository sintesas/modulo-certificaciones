<!doctype html>
<html>
<head>
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
   
    <!-- Styles -->
	<link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
	<style type="text/css">
		img {			
			width: 100%px; height: 250px;
			opacity: 0.5;
		}

		.card-title{
			color:#08DBC2;
			font-size:25px;
		}

		.card{
			box-shadow: 4px 4px 10px #999;
		}

		.card-body{
			height: auto
		}
		
		.btn{
			margin-bottom: 5%;
		}

		.card{
			width:270px;
		}

		

		@media (max-width: 1150px) {
			.row{
			width:auto;
			display: block;
			text-align:center;
			margin-left: 40% !important;
		}
		}

		
				
	</style>
</head>

<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
		<form method="POST" action="<?php echo e(route('logout')); ?>">
						<?php echo csrf_field(); ?>
				<button type="submit " class="btn btn-danger">Cerrar sesión.</button>
				<?php if(auth()->user()->role == 1): ?>	
				<a href="/admin" class="btn btn-info">Administrador</a>
				<?php endif; ?>
		</form>
    </div>
  </div>
</nav>
<div class="row" style="margin-left: 80px; margin-right: 80px; margin-top: 30px;">
	<div class="col-md-3 text-center">
		<div class="card" >		 
		  <div class="card-body">
		  	<form method="post" action="<?php echo e(route('download')); ?>">
			  <?php echo csrf_field(); ?>
			  <input name="tipoCert" id="tipoCert" type="hidden" value="UL">
				<h5 class="card-title">Certificado unidad laboral</h5>
				<p class="card-text">Obtenga su certificado de unidad laboral actual</p>
				<button type="submit" class="btn btn-dark">Solicitar</button>
			</form>
		  </div>
		</div>
	</div>
	<div class="col-md-3 text-center">
		<div class="card" >
		  
		  <div class="card-body">
		  <form method="post" action="<?php echo e(route('download')); ?>">
			  <?php echo csrf_field(); ?>
			  <input name="tipoCert" id="tipoCert" type="hidden" value="CT">
		    <h5 class="card-title">Certificado de tiempos</h5>
		    <p class="card-text">Obtenga un certificado contiene el historial laboral.</p>
		    <button type="submit" class="btn btn-dark">Solicitar</button>
			</form>
		  </div>
		</div>
	</div>
	<div class="col-md-3 text-center">
		<div class="card" >
		
		  <div class="card-body">
		  <form method="post" action="<?php echo e(route('download')); ?>">
			  <?php echo csrf_field(); ?>
			  <input name="tipoCert" id="tipoCert" type="hidden" value="CC">
		    <h5 class="card-title">Certificado de cargos</h5>
		    <p class="card-text">Obtenga la certificación de los cargos desempeñados.</p>
		    <button type="submit" class="btn btn-dark">Solicitar</button>
			</form>
		  </div>
		</div>
	</div>	
	<div class="col-md-3 text-center">
		<div class="card" >
		 
		  <div class="card-body">		 
		    <h5 class="card-title">Desprendibles de pago</h5>
		    <p class="card-text">Obtenga su desprendible de pago del último mes.</p>
		    <button type="button" class="btn btn-dark"  data-toggle="modal" data-target="#dateModal">Solicitar</button>
		</div>
		</div>
	</div> 
</div>

<div class="row" style="margin-left: 80px; margin-right: 80px; margin-top: 30px;">
	
</div>
<br><br>

<div class="modal fade" id="dateModal" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dateModalLabel">Ingrese un mes y año</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">	    
		<form method="post" action="<?php echo e(route('download')); ?>">
			<?php echo csrf_field(); ?>
				<input name="tipoCert" id="tipoCert" type="hidden" value="CP">
			
			<div class="form-group">
			<label for="recipient-name" class="col-form-label">Tipo Nómina:</label>				
				<select onchange="onanos()" class="form-control" name="tnomina" id="tnomina">
				<option value=""></option>
				<?php $__currentLoopData = $tiposnomina; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<?php if($tipo->tipo_nomina == 2): ?>
					<option value="<?php echo e($tipo->tipo_nomina); ?>">PRIMA DE SERVICIO</option>
					<?php elseif($tipo->tipo_nomina == 3): ?>
					<option value="<?php echo e($tipo->tipo_nomina); ?>">PRIMA DE NAVIDAD</option>
					<?php elseif($tipo->tipo_nomina == 4): ?>
					<option value="<?php echo e($tipo->tipo_nomina); ?>">RETROACTIVO</option>
					<?php elseif($tipo->tipo_nomina == 5): ?>
					<option value="<?php echo e($tipo->tipo_nomina); ?>">ADICIONAL</option>
					<?php elseif($tipo->tipo_nomina == 6): ?>
					<option value="<?php echo e($tipo->tipo_nomina); ?>">ADICIONAL VIGENCIA ACTUAL</option>
					<?php elseif($tipo->tipo_nomina == 1): ?>
					<option value="<?php echo e($tipo->tipo_nomina); ?>">NOMINA MENSUAL</option>
					<?php else: ?>
					<option value="<?php echo e($tipo->tipo_nomina); ?>">ADICIONAL VIGENCIA EXPIRADA</option>
					<?php endif; ?>					
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>					
				</select>	
			</div>			
			<div class="form-group">
				<label for="message-text" class="col-form-label">Año:</label>
				<select onchange="onmeses()" class="form-control" name="ano" id="ano">
				</select>
			</div>
			<div class="form-group">
				<label for="recipient-name" class="col-form-label">Mes:</label>				
				<select id="meses" name="meses" class="form-control" name="mes" id="mes">					
				</select>				
			</div>
							
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="button" type="submit" class="btn btn-dark">Solicitar</button>
      </div>
	  </form>
    </div>
  </div>
</div>

</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
	if(<?php echo e($errors->any()); ?>){
		swal("Error!", '<?php echo e($errors->first()); ?>', "info");
	}

</script>
<script>

	function onmeses() {
		var ano = document.getElementById("ano").value;
		var nomina = document.getElementById("tnomina").value;

		var action = window.location.origin + '/search_meses/' + ano + '/' + nomina
		var meses = $("#meses");
          
		  $.ajax({
				  url: action,
				  dataType: 'json',
				  type: 'GET',
				  success: function (response) {
					var r = response;
					  if (r.error == "1") {
						  swal("Lo sentimos!", r.msn, "info");
					  }else{						
						meses.prop('disabled', false);
						// Limpiamos el select
						meses.find('option').remove();
						meses.append('<option value=""></option>');
						$(r.msn).each(function(i, v){ // indice, valor
						
						if (v.mes_nomina == 1) {
							meses.append('<option value="' + v.mes_nomina + '">Enero</option>');
						}else if(v.mes_nomina == 2){
							meses.append('<option value="' + v.mes_nomina + '">Febrero</option>');
						}
						else if(v.mes_nomina == 3){
							meses.append('<option value="' + v.mes_nomina + '">Marzo</option>');
						}
						else if(v.mes_nomina == 4){
							meses.append('<option value="' + v.mes_nomina + '">Abril</option>');
						}						
						else if(v.mes_nomina == 5){
							meses.append('<option value="' + v.mes_nomina + '">Mayo</option>');
						}
						else if(v.mes_nomina == 6){
							meses.append('<option value="' + v.mes_nomina + '">Junio</option>');
						}
						else if(v.mes_nomina == 7){
							meses.append('<option value="' + v.mes_nomina + '">Julio</option>');
						}
						else if(v.mes_nomina == 8){
							meses.append('<option value="' + v.mes_nomina + '">Agosto</option>');
						}
						else if(v.mes_nomina == 9){
							meses.append('<option value="' + v.mes_nomina + '">Septiembre</option>');
						}
						else if(v.mes_nomina == 10){
							meses.append('<option value="' + v.mes_nomina + '">Octubre</option>');
						}
						else if(v.mes_nomina == 11){
							meses.append('<option value="' + v.mes_nomina + '">Noviembre</option>');
						}
						else if(v.mes_nomina == 12){
							meses.append('<option value="' + v.mes_nomina + '">Diciembre</option>');
						}
							
						})
						meses.prop('disabled', false);                  
					  }
				  },
			  
			  }); 
	
}

function onanos(){
		var nomina = document.getElementById("tnomina").value;
		var action = window.location.origin + '/search_anos/' + nomina
		var anos = $("#ano");
		var meses = $("#meses");
		meses.find('option').remove();

		$.ajax({
			url: action,
			dataType: 'json',
			type: 'GET',
			success: function (response) {
				var r = response;
				if (r.error == "1") {
					swal("Lo sentimos!", r.msn, "info");
				}else{						
					anos.prop('disabled', false);
					// Limpiamos el select
					anos.find('option').remove();
						anos.append('<option value=""></option>');
					$(r.msn).each(function(i, v){ // indice, valor
						anos.append('<option value="' + v.ano_nomina + '">' + v.ano_nomina + '</option>');
					})
						anos.prop('disabled', false);	
					}
			},
			
		}); 

	}

</script>

</html>

<?php /**PATH C:\xampp\htdocs\cms\resources\views/certificados.blade.php ENDPATH**/ ?>