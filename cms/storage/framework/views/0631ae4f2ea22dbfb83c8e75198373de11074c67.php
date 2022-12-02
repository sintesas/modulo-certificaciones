<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GuestLayout::class, []); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/img_bg_2.jpg);height: 969px;">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Certificados</h1>
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">
											<div class="col-md-6"><h3>Buscar</div><div class="col-md-6"><img src="<?php echo e(url('images/logoF.png')); ?>" width="100%" height="80%"></h3></div>
                                              <div class="row form-group"> 		
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <p for="usuario">Digite el código de seguridad que aparece en el certificado</p>
                                                        <input onkeyup="onKeyUp(event)" type="text" id="search" name="search" class="form-control input-sm chat-input" placeholder="Buscar" focus/>

                                                    </div>
                                                </div>
												<div class="g-recaptcha" data-sitekey="6LeBEREbAAAAAPtU-26-syjyS_tsvqsl0_Um8RUv"></div><br>
												<a class="btn btn-primary btn-block" onclick="buscar()" style="color:white">Consultar</a>
                                            	<a class="btn btn-primary btn-block" href="<?php echo e(url('login')); ?>" style="color:white">Regresar al Inicio</a>
											
										</div>		
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
</header>
<?php $__env->startSection('scriptsFotter'); ?>

<script type="text/javascript">
	if(<?php echo e($errors->any()); ?>){
		swal("<?php echo e($errors->first('title')); ?>", "<?php echo e($errors->first('text')); ?>", "<?php echo e($errors->first('button')); ?>");
	}
</script>
<?php $__env->stopSection(); ?>
 <?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

<?php /**PATH C:\Apache24\htdocs\resources\views/auth/search.blade.php ENDPATH**/ ?>