<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Certificado de Tiempos</title>

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

      

      .img_P2{
        width:150px;
        height:120px;
        margin-right: 12%;
      }

      .img_P3{
        width:65%;
        height:80px;
      }

      .containerImgPie{
        margin-left: 20%;
        margin-top: 4.4%;
      }
      
      th, .td1 {
        border: 1px solid black;
        border-collapse: collapse;
      }

      .table1{
        border: 1px solid black;
        border-collapse: collapse;       
        width:76.5%;
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

      .textP{
        font-size: 10px;
      }
      .textP2{
        font-size: 9px;
        text-align: center;
      }

      .lateralUrl{       
        font-size: 11px;
        writing-mode: vertical-lr;
        transform: rotate(270deg);
        margin-left: -18%;
        margin-right: 515px;
      }

      .textURLPIE{
        font-size: 7px;       
      } 

      .pietext{
        text-align:center;
        margin-top: 3.5%;
      } 

      .containerImgPie2{
        margin-left: 40%;
        margin-top: 0%;
      }

      .img_P1{
        width:150px;       
        margin-right: 12%;
      }
    </style>
    
  </head>
  <body>
    <table>
      <tr>
        <td>                 
          <div>
              <h5 class="h5titulo" style="margin-top: 0%;">
              REPUBLICA DE COLOMBIA <br>
              MINISTERIO DE DEFENSA NACIONAL
              </h5>
          </div>
          <div class="divescudo">    
            <img class= "escudo" src="<?php echo e($datosGenerales['logo']); ?>" alt="Logo" />
          </div>
          <div>
          <img class="imgCode" src="data:image/png;base64,<?php echo e(DNS2D::getBarcodePNG($idDocumento, 'PDF417')); ?>" alt="Bacode" />
          <p class="lateralCode">Identificador :<?php echo e($idDocumento); ?> (Válido indefinidamente)<p>
          <div>
          <p class="lateralUrl">URL:<?php echo e($_SERVER['HTTP_ORIGIN']); ?>/search<p>
          
          </div><h5 style="margin-top: -20%;"></h5>
          <br>
          <br>
          <h5 style="margin-top: -10%;"> FUERZA AEREA COLOMBIANA</h5>
          <h5 style="margin-top: -20%;"></h5>
          <br>
          <h5 style="margin-top: -8%;">EL (LA) SUSCRITO(A) DIRECTOR DE PERSONAL DIPER</h5>
          <br>
          <h4 style="margin-top: -4.5%;">HACE CONSTAR</h4>
          <p class="texto">
          <?php if($dataTiempos[0]['strActivo'] == 'retirado'): ?>
            Que el(la) Señor(a)(ita) <?php echo e($dataTiempos[0]['categoria']); ?> <?php echo e($dataTiempos[0]['grado']); ?> (R) <?php echo e($dataTiempos[0]['nombres_apellidos']); ?>, identificado (a) con CC No. <?php echo e($dataTiempos[0]['cedula']); ?>

            y código militar <?php echo e($dataTiempos[0]['codigo_militar']); ?>, quien actualmente es <?php echo e($dataTiempos[0]['strActivo']); ?> en el (la) <?php echo e($dataTiempos[0]['unidad_laboral']); ?> le figura la siguiente información:
          <?php else: ?>
          Que el(la) Señor(a)(ita) <?php echo e($dataTiempos[0]['categoria']); ?> <?php echo e($dataTiempos[0]['grado']); ?> <?php echo e($dataTiempos[0]['nombres_apellidos']); ?>, identificado (a) con CC No. <?php echo e($dataTiempos[0]['cedula']); ?>

            y código militar <?php echo e($dataTiempos[0]['codigo_militar']); ?>, quien actualmente es <?php echo e($dataTiempos[0]['strActivo']); ?> en el (la) <?php echo e($dataTiempos[0]['unidad_laboral']); ?> le figura la siguiente información:
          <?php endif; ?>
          </p>
                    
          </div>
          <div style="margin-left: 11%;">          
            <h4 style="text-align: center;">Fecha corte: <?php echo e(substr($datosGenerales['fechaCorte'],0,10)); ?>

            </h4>
            <table class="table1 center">
              <tr>
              <th>NOVEDAD</th>
              <th>DISPOSISION</th>
              <th>FECHAS</th>
              <th>TOTAL</th>
              </tr>
              <tr>
              <th class="thSinBorde1"></th>
              <th class="thSinBorde"></th>
              <th> &nbsp; &nbsp;DE  &nbsp; &nbsp; &nbsp;  A &nbsp; &nbsp;</th>
              <th>AA-MM-DD</th>
              </tr>
              <?php $__currentLoopData = $dataTiempos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>              
              <tr>
                <td class="td1 textP"><?php echo e($dt['tipo_tiempo']); ?></td>
                <td class="td1 textP"><?php echo e($dt['tipo_disposicion']); ?> <?php echo e($dt['numero_disposicion']); ?> <?php echo e($dt['fecha_disposicion']); ?> </td>
                <td class="td1 textP2"><?php echo e($dt['fecha_inicio']); ?> - <?php echo e($dt['fecha_termino']); ?> </td>
                <td class="td1 textP" style="text-align: center;"><?php echo e($dt['subtotal']); ?></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
              <tr>
              <td class="td1 thSinBorde1 textP" colspan="2">Total tiempos reconocidos en FUERZA AEREA COLOMBIANA </td> <td class="td1 thSinBorde thSinBorde1">&nbsp;</td>
               <td class="td1" style="text-align: center; font-size: 11px;"><strong><?php echo e($dataTiempos[count($dataTiempos)-1]['total']); ?></strong></td>
              </tr>
            </table>
            <br>
            <p class="nota">Nota: Este certificado no es válido para retiro, los datos aquí contenidos son los registrados en su historial laboral, para reconocimientos prestacionales deben ser avalados 
            por la Dirección de Prestaciones Sociales, de acuerdo a las normas legales vigentes. Para efectos de asignación de retiro o pensión en el caso de tener tiempo de Alumno
            se liquidará sin sobrepasar 2 años.</p>
          </div>
          <div>
          <p class="lateralFirma">Firmado digitalmente por: MINISTERIO DE DEFENSA NACIONAL <br>
          Organización: <br>
          Fecha firma : <?php echo e($datosGenerales['fechaActual']); ?>

           <p>           
          </div>
          <br>
          <p class="expide">Se expide en Bogotá D.C. al (los) <?php echo e($datosGenerales['fechaLetras']); ?></p>
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
           <img class= "img_P1" src="<?php echo e($datosGenerales['base64LogoPie']); ?>" alt="Logo" /> 
          </div>               
          </td>          
        </tr>           
     </table>
     
  </body>
</html><?php /**PATH C:\Apache24\htdocs\resources\views/pdf/tiempos.blade.php ENDPATH**/ ?>