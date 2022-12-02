<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Certificado Cargos</title>

    <style type="text/css">
    h1,h2,h3,h4,h5,h6 { font-family: "Helvetica Neue", Helvetica}
    body{ font-family: "Helvetica Neue", Helvetica}
    p{ font-family: "Helvetica Neue", Helvetica}
    table,td, th{ font-family: "Helvetica Neue", Helvetica}

      .escudo{
        width: 100px; 
        height: 80px;
        margin-top: -2%;        
      }
      .img_firma{
        width: 350px; 
        height: 90px;
      }
      h5, h4{
        text-align: center;        
      }

      .h5titulo{
        margin-top: 20px;
      }

      .divescudo{
        text-align: center;
      }

      hr{        
        width: 50%;

      }
      .frima{        
        font-size: 12px;
        text-align: center;
      }
      .divFirma{
        text-align: center;
        margin-top: 1%;  
      }
      .td1{
        width:40px;
        text-align: left;
        box-sizing: border-box;
       
      }
      .td2{       
        width:60px;
        box-sizing: border-box;
      }

      .imgCode{        
        width: 350px;
        height:35px; 
        writing-mode: vertical-lr;
        transform: rotate(270deg);
        margin-left: -24.5%;
        margin-top: 4%;      
      }

      .lateral{       
        width:800%;
        margin-top: 12%;
        margin-left: -395%;
        font-size: 12px;

      }

      .lateralCode{       
        font-size: 11px;
        writing-mode: vertical-lr;
        transform: rotate(270deg);
        margin-left: -94.5%;
        margin-top:-62%;
      }

      .texto{
        margin-left:11%; 
        text-align: justify;
        font-size: 15px;      
      }

      .lateralFirma{
        font-size: 11px;
        writing-mode: vertical-lr;
        transform: rotate(270deg);       
        margin-top: -38%;
        margin-left: -99%;
      }

      .img_P1{
        width:150px;
        height:120px;
        margin-right: 12%;
      }

      .img_P2{
        width:150px;       
        margin-right: 12%;
      }

      .img_P3{
        width:65%;
        height:80px;
      }

      .containerImgPie{
        margin-left: 18%;
        margin-top: 2%;
      }
      
      th{
        border-bottom-style: solid;
        border-collapse: collapse;
        text-align: left;
      }

      .table1{
        border-bottom-style: solid;
        border-collapse: collapse;       
        width:88%;
        margin-left:20%;
      }

      .thSinBorde{
        border-left-style: none;
      }

      .thSinBorde1{
        border-right-style: none;
      }

      .nota{
        font-size: 10px;
        text-align: justify;
        margin-left:11%;
      }

      .expide{
        margin-left:11%;
      }

      .generado{
        font-size: 9px;
        color:#CACBCB;
        margin-left:11%;
        margin-top:6%;
      }

      td{
        font-size: 10px;
      }

      .lateralUrl{       
        font-size: 11px;
        writing-mode: vertical-lr;
        transform: rotate(270deg);
        margin-left: -17.5%;
        margin-right: 512px;
      }
      .textURLPIE{
        font-size: 7px;       
      } 

      .pietext{
        text-align:center;
        margin-top: 11%;
      } 

      .containerImgPie2{
        margin-left: 40%;
        margin-top: 6%;
      }
    </style>
    
  </head>
  <body>
    <table>
      <tr>
        <td>                 
          <div>
              <h5 class="h5titulo" style="margin-top: 0%;font-size: 13px;">
              REPUBLICA DE COLOMBIA <br>
              MINISTERIO DE DEFENSA NACIONAL
              </h5>
          </div>
          <div class="divescudo">    
            <img class= "escudo" src="<?php echo e($datosGenerales['logo']); ?>" alt="Logo" />
          </div>
          <div>
          <img class="imgCode" src="data:image/png;base64,<?php echo e(DNS2D::getBarcodePNG($idDocumento, 'PDF417')); ?>" alt="Bacode" />
          <p class="lateralCode">Identificador :<?php echo e($idDocumento); ?> (Válido indefinidamente)<p><div>
          <p class="lateralUrl">URL:<?php echo e($_SERVER['HTTP_ORIGIN']); ?>/search<p>
          
          </div><h5 style="margin-top: -20%;"></h5>
          <br>
          <br>
          <br>
          <h5 style="margin-top: -9%;font-size: 13px;"> FUERZA AEREA COLOMBIANA</h5>
          <h5 style="margin-top: -20%;"></h5>
          <br>
          <h5 style="margin-top: -8%;font-size: 13px;">EL (LA) SUSCRITO(A) DIRECTOR DE PERSONAL DIPER</h5>
          <br>
          <h4 style="margin-top: -4.5%;">HACE CONSTAR</h4>
          <p class="texto">
            Que el(la) Señor(a)(ita) (<?php echo e($dataCC[0]->grado_actual); ?>) <?php echo e($dataCC[0]->apellidos_nombres); ?> identificado con CC No. <?php echo e($dataCC[0]->identificacion); ?>. ingresó a FUERZA AEREA COLOMBIANA
            desde el <?php echo e($fecha_inicio); ?> y a la fecha desempeñó los siguientes cargos, así:
          </p>                    
          </div>

          <div style="margin-left: 7%;"> 
            <table class="table1 center">
              <tr>
              <th>GR</th>
              <th>CARGO</th>
              <th>UNIDAD DEPENDENCIA</th>
              <th>INICIO</th>
              <th>TERMINO</th>
              </tr>

              <?php $__currentLoopData = $dataCC; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                 
                <tr>
                  <td><?php echo e($cc->grado_cargo); ?></td> 
                  <td><?php echo e($cc->cargo); ?></td>
                  <td><?php echo e($cc->dependencia_cargo); ?></td>
                  <td><?php echo e(date("d-m-Y", strtotime($cc->fecha_inicio))); ?></td>
                  <?php if($cc->fecha_termino == ''): ?>
                    <td></td>
                  <?php else: ?>
                  <td> <?php echo e(date("d-m-Y", strtotime($cc->fecha_termino))); ?></td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
              
            </table> 
            <br>                      
          </div>
          <p class="nota">Los datos aquí contenidos son los registros en su historial laboral. Se expide la presente constancia.
            Dada a los <?php echo e($datosGenerales['fechaLetras']); ?> en la ciudad de Bogotá D.C. Caducidad 30 días a partir de la fecha.</p>
          <div>
          <p class="lateralFirma">Firmado digitalmente por: MINISTERIO DE DEFENSA NACIONAL <br>
          Organización: <br>
          Fecha firma : <?php echo e($datosGenerales['fechaActual']); ?>

           <p>           
          </div>
            <br><br><br> <br> 
            <div class="containerImgPie">          
          <img class= "img_P3" src="<?php echo e($datosGenerales['fotoPie']); ?>" alt="Logo" />
          </div>     
          <div class="divFirma">            
            <hr>
            <p class="frima">
            <strong><?php echo e($datosFirmante->grado); ?> <?php echo e($datosFirmante->nombre_apellidos); ?></strong>
            </p>
            <p class="frima">
            <strong>DIRECTOR DE PERSONAL DIPER FUERZA AEREA COLOMBIANA</strong>
            </p>
          </div>

          <div class="pietext">
          <p class="textURLPIE">Señores Entidades Externas para validar este certificado puede copiar este código hash: <?php echo e($idDocumento); ?>

          y lo puede validar en ruta <?php echo e($_SERVER['HTTP_ORIGIN']); ?>/search</p>
          </div>

          <div class="containerImgPie2">          
           <img class= "img_P2" src="<?php echo e($datosGenerales['base64LogoPie']); ?>" alt="Logo" /> 
          </div>
                          
          </td>          
        </tr>           
     </table>
     
  </body>
</html><?php /**PATH C:\Apache24\htdocs\resources\views/pdf/cargos.blade.php ENDPATH**/ ?>