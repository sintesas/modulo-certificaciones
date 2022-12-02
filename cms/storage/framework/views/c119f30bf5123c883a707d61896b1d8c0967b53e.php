<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Certificado de Pagos</title>

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
     
      .frima{        
        font-size: 12px;
        text-align: center;
      }
      .divFirma{
        text-align: center;
        margin-top: -2%;  
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
        margin-top: -92%;
        margin-left: -125%;
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
        margin-left: 14%;
        margin-top: 0%;
      }
      
      th{        
        border-collapse: collapse;
        text-align: left;
        border-top-style: solid;
        border-bottom-style: solid;
       
      }

      .table1{       
        border-collapse: collapse;       
        width:100%;
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
        margin-left:0%;
        margin-top:17%;
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

      .hr1{
        width: 120px;
        margin-left: 80%;
        margin-bottom: -2%;
      }

      .hr2{
        width: 120px;
        margin-right: 55%;
      }

      .table2{
        width:40%;
        border: 1px solid black;
      }

      .divtableembargo{   
        margin-top:-36.6%;
        margin-left:40%;        
      }

      .tableembargo{
        border-collapse: collapse;       
        width:100%;
      }

      .tabladescuestos{ 
        border-collapse: collapse;
        width:50%;
       }

      .tabledevengado{       
        border-collapse: collapse;       
        width:100%;
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
        margin-top: -2%;       
      } 

      .containerImgPie2{
        margin-left: 38%;
        margin-top: -1%;
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
          <p class="lateralCode">Identificador : <?php echo e($idDocumento); ?> (Válido indefinidamente)<p>
          <div>
          <p class="lateralUrl">URL:<?php echo e($_SERVER['HTTP_ORIGIN']); ?>/search<p>
          
          </div><h5 style="margin-top: -20%;"></h5>
          <br>
          <h5 style="margin-top: -9%;font-size: 13px;"> FUERZA AEREA COLOMBIANA</h5>
          <h5 style="margin-top: -20%;font-size: 13px;"></h5>
          <br>
          <h5 style="margin-top: -8%;font-size: 13px;">EL (LA) SEÑOR(A) DIRECTOR DE PERSONAL DIPER</h5>
          <br>
          <h4 style="margin-top: -4.5%;">HACE CONSTAR</h4>
          <p class="texto">
          Que el(la) Señor(a) <?php echo e($dataPagos['dataGrado']->grado); ?> <?php echo e($dataPagos['devengado'][0]->nombres_apellidos); ?>, identificado con CC No. <?php echo e($dataPagos['devengado'][0]->cc); ?>

          y código militar <?php echo e($dataPagos['devengado'][0]->codigo_militar); ?> está en la nómina mensual activos del mes de <?php echo e($mesLetra); ?> del <?php echo e($ano); ?> y le figura 
          la siguiente información: 
          </p>                    
          </div>

          <div style="margin-left: 11%;">
         
            <table class="tabledevengado">
              <tr>
              <th style="border-left-style: solid">DEVENGADO</th>
              <th>PORCE</th>
              <th>VALOR</th>
              <th>DESCUENTO</th>
              <th>COD.</th>
              <th>INICIO</th>
              <th>TERMINO</th>
              <th style="border-right-style: solid">VALOR</th>             
              </tr>
              <?php if(count($dataPagos['devengado']) == count($dataPagos['descuentos'])): ?>
              <?php $__currentLoopData = $dataPagos['devengado']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $dev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($dev->abreviatura); ?></td> 
                  <td><?php echo e($dev->porcentaje); ?></td>
                  <td>$<?php echo e(number_format($dev->valor_dev, 0, ',', '.')); ?></td>
                  <td><?php echo e($dataPagos['descuentos'][$index]->abr); ?></td>
                  <td><?php echo e($dataPagos['descuentos'][$index]->id_tipo_descuento); ?></td>
                  <td><?php echo e($dataPagos['descuentos'][$index]->desc_ini); ?></td>
                  <td><?php echo e($dataPagos['descuentos'][$index]->desc_ter); ?></td>
                  <td>$<?php echo e(number_format($dataPagos['descuentos'][$index]->valor_desc, 0, ',', '.')); ?></td>                 
                  </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php elseif(count($dataPagos['devengado']) < count($dataPagos['descuentos'])): ?>
                <?php $__currentLoopData = $dataPagos['devengado']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $dev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($dev->abreviatura); ?></td> 
                      <td><?php echo e($dev->porcentaje); ?></td>
                      <td>$<?php echo e(number_format($dev->valor_dev, 0, ',', '.')); ?></td>
                      <td><?php echo e($dataPagos['descuentos'][$index]->abr); ?></td>
                      <td><?php echo e($dataPagos['descuentos'][$index]->id_tipo_descuento); ?></td>
                      <td><?php echo e($dataPagos['descuentos'][$index]->desc_ini); ?></td>
                      <td><?php echo e($dataPagos['descuentos'][$index]->desc_ter); ?></td>
                      <td>$<?php echo e(number_format($dataPagos['descuentos'][$index]->valor_desc, 0, ',', '.')); ?></td>                    
                   </tr>                  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php for($i = 0; $i < (count($dataPagos['descuentos']) - count($dataPagos['devengado'])); $i++): ?>
                     <tr>
                      <td></td> 
                      <td></td>
                      <td></td>
                      <td><?php echo e($dataPagos['descuentos'][count($dataPagos['devengado']) + $i]->abr); ?></td>
                      <td><?php echo e($dataPagos['descuentos'][count($dataPagos['devengado']) + $i]->id_tipo_descuento); ?></td>
                      <td><?php echo e($dataPagos['descuentos'][count($dataPagos['devengado']) + $i]->desc_ini); ?></td>
                      <td><?php echo e($dataPagos['descuentos'][count($dataPagos['devengado']) + $i]->desc_ter); ?></td>
                      <td>$<?php echo e(number_format($dataPagos['descuentos'][count($dataPagos['devengado']) + $i]->valor_desc, 0, ',', '.')); ?></td>
                    </tr> 
                  <?php endfor; ?>
              <?php elseif(count($dataPagos['devengado']) > count($dataPagos['descuentos'])): ?>
                <?php $__currentLoopData = $dataPagos['descuentos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $dev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($dataPagos['devengado'][$index]->abreviatura); ?></td> 
                      <td><?php echo e($dataPagos['devengado'][$index]->porcentaje); ?></td>
                      <td>$<?php echo e(number_format($dataPagos['devengado'][$index]->valor_dev, 0, ',', '.')); ?></td>
                      <td><?php echo e($dev->abr); ?></td>
                      <td><?php echo e($dev->id_tipo_descuento); ?></td>
                      <td><?php echo e($dev->desc_ini); ?></td>
                      <td><?php echo e($dev->desc_ter); ?></td>
                      <td>$<?php echo e(number_format($dev->valor_desc, 0, ',', '.')); ?></td>                    
                   </tr>                  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php for($i = 0; $i < (count($dataPagos['devengado']) - count($dataPagos['descuentos'])); $i++): ?>
                     <tr>
                      <td><?php echo e($dataPagos['devengado'][count($dataPagos['descuentos']) - $i]->abreviatura); ?></td> 
                      <td><?php echo e($dataPagos['devengado'][count($dataPagos['descuentos']) - $i]->porcentaje); ?></td>
                      <td><?php echo e(number_format($dataPagos['devengado'][count($dataPagos['descuentos']) - $i]->valor_dev, 0, ',', '.')); ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr> 
                  <?php endfor; ?>
              <?php endif; ?>
            </table> 
           
            <br>
            
           
            <table class="table1 center">
              <tr>
                <td style=" font-size: 10;">
                <strong>TOTAL DEVENGADOS: <?php echo e(number_format($dataPagos['totaDevengado'], 0, ',', '.')); ?></strong>
                </td>
                <td style=" font-size: 10;">
                <strong>TOTAL DESCUENTOS: </strong>
                </td>
                <td style="text-align: left;">
                <?php echo e(number_format($dataPagos['totalDescuentos'], 0, ',', '.')); ?>

                </td>
              </tr>
            </table> 
            <br>
            <div>
            <div>
            <table class="table2">
              <tr>
                <td style=" font-size: 11; border-bottom-style: solid"><strong>RESUMEN</strong></td>
                <td></td>                
              </tr>              
              <tr>
                <td style=" font-size: 11;">TOTAL DEVENGADO</td>
                <td>$<?php echo e(number_format($dataPagos['totaDevengado'], 0, ',', '.')); ?></td>                
              </tr>
              <tr>
                <td style=" font-size: 11;">TOTAL DESCUENTOS</td>
                <td>$<?php echo e(number_format($dataPagos['totalDescuentos'], 0, ',', '.')); ?></td>                
              </tr>
              <tr>
                <td style=" font-size: 11;">&nbsp;</td>
                <td>&nbsp;</td>                
              </tr>
              <tr>
                <td style=" font-size: 11;">&nbsp;</td>
                <td style="border-bottom-style: solid">&nbsp;</td>                
              </tr>
              <tr>
                <td style=" font-size: 11;"><strong>NETO A PAGAR</strong></td>
                <td><strong>$<?php echo e(number_format($dataPagos['totaDevengado'] - $dataPagos['totalDescuentos'], 0, ',', '.')); ?></strong></td>                
              </tr>
            </table>
            </div>
            <div  class="divtableembargo">
            <table class="tableembargo">
              <tr>
                <th style=" font-size: 11; border: 1px solid black; border-left-style: solid;"><strong>EMBARGO</strong></th>
                <th style=" font-size: 11; border: 1px solid black;"><strong>INICIO</strong></th>
                <th style=" font-size: 11; border: 1px solid black;"><strong>TERMINO</strong></th>
                <th style=" font-size: 11; border: 1px solid black; border-right-style: solid;"><strong>VALOR</strong></th>
              </tr>
              <?php $__currentLoopData = $dataPagos['embargo']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $des): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
              <tr>
                <td><?php echo e($des->descripcion); ?></td>
                <td><?php echo e($des->emb_inicio); ?></td>
                <td><?php echo e($des->emb_termino); ?></td>
                <td><?php echo e(number_format($des->emb_valor, 0, ',', '.')); ?></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            </div>                    
          </div>
          <p class="nota">Nota: Con de determinar la capacidad de endeudamiento para el descuento por libranza,
          el sector Cooperativo y bancario debe tener en cuenta la normatividad establecida en la ley 1527 de 
          2012 y el código sustantivo del Trabajo, por lo cual no serán autorizados descuentos que afecten el mínimo 
          vital del funcionario, una vez efectuados los descuentos de Ley y Órdenes Judiciales.</p>

          <p style="font-size: 12px;">Se expide en Bogotá D.C. al (los) <?php echo e($fechaLetras); ?></p>

          <div>
          <p class="lateralFirma">Firmado digitalmente por: MINISTERIO DE DEFENSA NACIONAL <br>
          Organización: <br>
          Fecha firma : <?php echo e($datosGenerales['fechaActual']); ?>

           <p>           
          </div>
            <br>
            <div class="containerImgPie">          
          <img class= "img_P3" src="<?php echo e($datosGenerales['fotoPie']); ?>" alt="Logo" />
          </div>        
          <div class="divFirma">            
            <hr style="width: 50%;">           
            <p class="frima">
            <strong><?php echo e($datosFirmante->grado); ?> <?php echo e($datosFirmante->nombre_apellidos); ?></strong>
            <br><strong>DIRECTOR DE PERSONAL DIPER FUERZA AEREA COLOMBIANA</strong>
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
</html><?php /**PATH C:\Apache24\htdocs\resources\views/pdf/pago.blade.php ENDPATH**/ ?>