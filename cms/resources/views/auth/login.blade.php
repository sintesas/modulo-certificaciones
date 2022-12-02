<x-guest-layout>
<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/img_bg_2.jpg);height: 100%;">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Certificados en Línea FAC</h1> 
						</div>
						<div class="col-md-5 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									<div class="tab-content">									
										<div class="tab-content-inner active" data-content="signup">
										<p style="font-size:18px;">Servicio para personal Activo y Retirado FAC</p>
										
											<div class="col-md-6"><h3>Ingrese </div><div class="col-md-6"><img src="{{ url('images/logoF.png')}}" width="100%" height="80%"></h3></div>
											<!-- <form onsubmit="return enviarMensaje()" method="POST" action="{{ route('login')}}" id="formulario-login"> -->
                                            <form method="POST" action="{{ route('login')}}" id="formulario-login">
                                                {{  csrf_field() }}
                                                <div class="row form-group"> 		
                                                <div class="row form-group {{ $errors->has('email')? 'has-error' : ''}}">
                                                    <div class="col-md-12">
                                                        <label for="usuario">Usuario</label>
                                                        <input type="email" id="email" name="email" class="form-control" placeholder="Ingrese su email">
                                                        {!! $errors->first('email','<span class="help-block">:message</span> ')!!} 
                                                    </div>
                                                </div>
                                                <div class="row form-group {{ $errors->has('password')? 'has-error' : ''}}">
                                                    <div class="col-md-12">
                                                        <label for="password">Contraseña</label>
                                                        <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese Clave">
														{!! $errors->first('password','<span class="help-block">:message</span> ')!!} 
													</div>
                                                    
                                                </div>
                                        
                                                    <div class="g-recaptcha" data-sitekey="6LeBEREbAAAAAPtU-26-syjyS_tsvqsl0_Um8RUv"><br></div>
													
												<a href="{{ url('forgot-password')}}"  style="color:blue; margin-left:70px; text-decoration: underline;" >Crear ó recuperar Contraseña</a>
												<br>
												
												<br>
												<button class="btn btn-primary btn-block" type="submit" style="margin-top: -10px;">Ingresar</button>
												<br>
												<div class="alert alert-info" role="alert">
												Sr usuario, si ingresa por primera vez o quiere validar su correo electrónico. Por favor dar click en <a href="{{ url('validate')}}" class="alert-link">validar aquí</a>
												</div>
												<div class="alert alert-info" role="alert">
													Srs Entidades Externas, si requiere validar el Certificado generado por la FAC, el cual está a nombre de un funcionario activo o persona retirada. Por favor dar<a href="{{ url('search')}}" class="alert-link"> validar autenticidad aquí</a>
												</div>
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
</x-guest-layout>
