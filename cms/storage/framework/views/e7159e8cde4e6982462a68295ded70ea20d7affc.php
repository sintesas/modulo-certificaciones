<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Fuerza Aérea Colombiana- Certificaciones en Línea</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/log/css/app.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/log/css/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/log/css/animate.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/log/css/icomoon.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/log/css/themify-icons.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/log/css/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/log/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/log/css/bootstrap-datepicker.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/log/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/log/css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/log/css/style.css')); ?>">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    


    <script>
        function enviarMensaje() {
            var response = grecaptcha.getResponse();
            if (response.length === 0) {
                console.log("Usuario sospechoso");
                return false;
            } else {
                return true;
            }
        }

        function onKeyUp(event) {
        var keycode = event.keyCode;
        var action = window.location.origin + '/search_document/' + $('input:text[name=search]').val()
       
            if(keycode == '13'){ 
                var cat = enviarMensaje();
                if(cat){    
                    $.ajax({
                            url: action,
                            dataType: 'json',
                            type: 'GET',
                            success: function (response) {

                                var result = response;

                                if (result.error == "1") {
                                    swal("Error!", result.msn, "error");
                                }else{
                                    swal("Correcto!", result.msn, "success");                   
                                }
                            },
                        
                    }); 

                }else{
                    swal("Error!", "Por favor confirmar control de seguridad  RECAPTCHA “No soy un robot”.", "info");                
                }
                } 
        }
        	

    function buscar() {       
        var action = window.location.origin + '/search_document/' + $('input:text[name=search]').val()        
        var cat = enviarMensaje();
        if(cat){ 
            $.ajax({
                    url: action,
                    dataType: 'json',
                    type: 'GET',
                    success: function (response) {

                        var result = response;

                        if (result.error == "1") {
                            swal("Error!", result.msn, "error");
                        }else{
                            swal("Correcto!", result.msn, "success");                   
                        }
                    },
            
            });
        }else{
            swal("Error!", "Por favor confirmar control de seguridad  RECAPTCHA “No soy un robot”.", "info");                
        }         
    }
    </script>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>

</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        <?php echo e($slot); ?>

    </div>
</body>

<?php echo $__env->yieldContent('scriptsFotter'); ?>

</html><?php /**PATH C:\xampp\htdocs\cms\resources\views/layouts/guest.blade.php ENDPATH**/ ?>