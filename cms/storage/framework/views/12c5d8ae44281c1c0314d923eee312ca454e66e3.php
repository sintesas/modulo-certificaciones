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
											<div class="col-md-6"><h3>Recuperar Contraseña </div><div class="col-md-6"><img src="<?php echo e(url('images/logoF.png')); ?>" width="100%" height="80%"></h3></div>
                                            <form method="POST" action="<?php echo e(route('password.email')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <div class="row form-group"> 		
                                                <div class="row form-group <?php echo e($errors->has('email')? 'has-error' : ''); ?>">
                                                    <div class="col-md-12">
                                                        <label  for="email" value="<?php echo e(__('Email')); ?>">Correo</label>
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.input','data' => ['id' => 'email','class' => 'form-control','type' => 'email','name' => 'email','value' => old('email'),'required' => true,'autofocus' => true]]); ?>
<?php $component->withName('jet-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'email','class' => 'form-control','type' => 'email','name' => 'email','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('email')),'required' => true,'autofocus' => true]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                                        <?php echo $errors->first('email','<span class="help-block">:message</span> '); ?> 
														<?php if(session('status')): ?>
														<div class="help-block">
															<?php echo e(session('status')); ?>

														</div>
                                            			<?php endif; ?>
							
                                                    </div>
                                                </div>
						
												<button class="btn btn-primary btn-block" type="submit">Restablecer Contraseña</button>
                                                <br>
                                                <h5 style="margin-left: 30px">
													Digité correo institucional o personal
												</h5>
												<span class="badge bg-info text-dark" style="margin-left: 20px ; padding: 10px;">Correo Institucional FAC para personal activo o  <br> correo personal para personas Retiradas.</span>
											</form>	
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
 <?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\Apache24\htdocs\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>