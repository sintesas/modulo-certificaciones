<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Certificado de Unidad Laboral</title>

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
      h5{
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
        margin-top: 40%;  
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
      }

      .obs{
        margin-left:11%;
        text-align: justify;
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
        margin-right: 12%;
      }

      .containerImgPie{
        margin-left: 40%;
        margin-top: 6%;
      }  

      .lateralUrl{       
        font-size: 11px;
        writing-mode: vertical-lr;
        transform: rotate(270deg);
        margin-left: -15%;
        margin-right: 515px;
      } 

      .textURLPIE{
        font-size: 7.5px;       
      } 

      .pietext{
        text-align:center;
        margin-top: 0.2%;
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
          <p class="lateralCode">Identificador : <?php echo e($idDocumento); ?> (Válido indefinidamente)<p>
          <div>
          <p class="lateralUrl">URL:<?php echo e($_SERVER['HTTP_ORIGIN']); ?>/search<p>
          
          </div><h5 style="margin-top: -20%;"></h5>
          <br>
          <br>
          <h5 style="margin-top: -10%;"> FUERZA AEREA COLOMBIANA</h5>
          <h5 style="margin-top: -20%;"></h5>
          <br>
          <h5 style="margin-top: -6%;"> LABORAL ACTUAL</h5>
          <br>
          <p class="texto">
          <?php if(isset($cargoData) && $cargoData->categoria != 'CIVIL'): ?>
          EL (LA) SUSCRITO(A) DIRECTOR DE PERSONAL DIPER de la (el) FUERZA AEREA
          COLOMBIANA, hace constar que una vez verificada la base de datos del Sistema de
          Información para la Administración del Talento Humano (SIATH), certifica que el(la)
          Señor(a)(ita) <?php echo e($cargoData->categoria); ?> <?php echo e($cargoData->grado); ?> <?php echo e($cargoData->apellidos_nombres); ?> identificado con cc.
          <?php echo e($cargoData->cedula); ?> expedida en <?php echo e($cargoData->lugar_cedula); ?>, se escalafonó en la (el)
          FUERZA AEREA COLOMBIANA como <?php echo e($cargoData->categoria); ?> el <?php echo e(strftime("%d-%B-%Y", strtotime($cargoData->fecha_disp))); ?>, mediante <?php echo e($dataTiempos->tipo_disposicion); ?> <?php echo e($dataTiempos->numero_disposicion); ?> del <?php echo e(strftime("%d-%B-%Y", strtotime($dataTiempos->fecha_disposicion))); ?>, registra como la última unidad laborada en
          el lapso <?php echo e(strftime("%d-%B-%Y", strtotime($cargoData->fecha_disp))); ?> a la fecha, en el (la) <?php echo e($cargoData->unidad_laboral); ?>, ubicado en la ciudad de Bogotá, Distrito
          Capital (Cundinamarca), ostentando el cargo de <?php echo e($cargoData->cargo); ?>. 
          <?php else: ?>
          EL (LA) SUSCRITO(A) DIRECTOR DE PERSONAL DIPER de la (el) FUERZA AEREA
          COLOMBIANA, hace constar que una vez verificada la base de datos del Sistema de
          Información para la Administración del Talento Humano (SIATH), certifica que el(la)
          Señor(a)(ita) <?php echo e($dataTiempos->categoria); ?> <?php echo e($dataTiempos->grado); ?> <?php echo e($dataTiempos->nombre_apellidos); ?> identificado con cc.
          <?php echo e($dataTiempos->cedula); ?> expedida en <?php echo e($dataTiempos->lugar_cedula); ?>, se escalafonó en la (el)
          FUERZA AEREA COLOMBIANA como <?php echo e($dataTiempos->categoria); ?> el <?php echo e(strftime("%d-%B-%Y", strtotime($dataTiempos->fecha_disposicion))); ?>, mediante <?php echo e($dataTiempos->tipo_disposicion); ?> <?php echo e($dataTiempos->numero_disposicion); ?> del <?php echo e(strftime("%d-%B-%Y", strtotime($dataTiempos->fecha_disposicion))); ?>, registra como la última unidad laborada en
          el lapso <?php echo e(strftime("%d-%B-%Y", strtotime($dataTiempos->fecha_disposicion))); ?> a la fecha, en el (la) <?php echo e($dataTiempos->unidad_laboral); ?>, ubicado en la ciudad de Bogotá, Distrito
          Capital (Cundinamarca), ostentando el cargo de <?php echo e($dataTiempos->cargo); ?>. 
          <?php endif; ?>
          </p>
          <br>          
          </div>
          <div>          
            <p class="obs">Se expide la presente constancia. Dada a los <?php echo e($datosGenerales['fechaLetras']); ?> en la ciudad
              de Bogotá D.C.
            </p>
          </div>
          <div>
          <p class="lateralFirma">Firmado digitalmente por: MINISTERIO DE DEFENSA NACIONAL <br>
          Organización: <br>
          Fecha firma : <?php echo e($datosGenerales['fechaActual']); ?>

           <p>
          </div>
          <div class="divFirma">
            <img class= "img_firma" src="<?php echo e($datosGenerales['firma']); ?>" alt="Logo" />
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
         
          <div class="containerImgPie">          
           <img class= "img_P2" src="<?php echo e($datosGenerales['base64LogoPie']); ?>" alt="Logo" /> 
          </div>        
          </td>          
        </tr>           
     </table>     
  </body>
</html><?php /**PATH C:\Apache24\htdocs\resources\views/pdf/unidad_laboral.blade.php ENDPATH**/ ?>