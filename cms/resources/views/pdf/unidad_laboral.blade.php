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
        width: 150px; 
        height: 80px;
        object-fit: contain;
        margin-right: 12%;
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
          <?php  setlocale(LC_TIME, "spanish");?>
          
              <h5 class="h5titulo" style="margin-top: 0%;">
              REPUBLICA DE COLOMBIA <br>
              MINISTERIO DE DEFENSA NACIONAL
              </h5>
          </div>
          <div class="divescudo">    
            <img class= "escudo" src="{{$datosGenerales['logo']}}" alt="Logo" />
          </div>
          <div>
          <img class="imgCode" src="data:image/png;base64,{{DNS2D::getBarcodePNG($idDocumento, 'PDF417')}}" alt="Bacode" />
          <p class="lateralCode">Identificador : {{$idDocumento}} (Válido indefinidamente)<p>
          <div>
          <p class="lateralUrl">URL:{{$_SERVER['HTTP_ORIGIN']}}/search<p>
          
          </div><h5 style="margin-top: -20%;"></h5>
          <br>
          <br>
          <h5 style="margin-top: -10%;"> FUERZA AÉREA COLOMBIANA</h5>
          <h5 style="margin-top: -20%;"></h5>
          <br>
          <h5 style="margin-top: -6%;">CERTIFICADO UNIDAD LABORAL ACTUAL</h5>
          <br>
          <p class="texto">
          @if(isset($cargoData) && $cargoData->categoria != 'CIVIL')
          EL (LA) SUSCRITO(A) DIRECTOR DE PERSONAL DIPER de la (el) FUERZA AÉREA
          COLOMBIANA, hace constar que una vez verificada la base de datos del Sistema de
          Información para la Administración del Talento Humano (SIATH), certifica que el(la)
          Señor(a)(ita) {{$cargoData->categoria}} {{$cargoData->grado}} {{$cargoData->apellidos_nombres}} identificado con cc.
          {{$cargoData->cedula}} expedida en {{$cargoData->lugar_cedula}}, se escalafonó en la (el)
          FUERZA AÉREA COLOMBIANA como {{$cargoData->categoria}} el {{strftime("%d-%B-%Y", strtotime($cargoData->fecha_disp))}}, mediante {{$dataTiempos->tipo_disposicion}} {{$dataTiempos->numero_disposicion}} del {{strftime("%d-%B-%Y", strtotime($dataTiempos->fecha_disposicion))}}, registra como la última unidad laborada en
          el lapso {{strftime("%d-%B-%Y", strtotime($cargoData->fecha_disp))}} a la fecha, en el (la) {{$cargoData->unidad_laboral}}, ubicado en la ciudad de Bogotá, Distrito
          Capital (Cundinamarca), ostentando el cargo de {{$cargoData->cargo}}. 
          @else
          EL (LA) SUSCRITO(A) DIRECTOR DE PERSONAL DIPER de la (el) FUERZA AÉREA
          COLOMBIANA, hace constar que una vez verificada la base de datos del Sistema de
          Información para la Administración del Talento Humano (SIATH), certifica que el(la)
          Señor(a)(ita) {{$dataTiempos->categoria}} {{$dataTiempos->grado}} {{$dataTiempos->nombre_apellidos}} identificado con cc.
          {{$dataTiempos->cedula}} expedida en {{$dataTiempos->lugar_cedula}}, se escalafonó en la (el)
          FUERZA AÉREA COLOMBIANA como {{$dataTiempos->categoria}} el {{strftime("%d-%B-%Y", strtotime($dataTiempos->fecha_alta_en_propiedad))}}, mediante {{$dataTiempos->tipo_disposicion}} {{$dataTiempos->numero_disposicion}} del {{strftime("%d-%B-%Y", strtotime($dataTiempos->fecha_alta_en_propiedad))}}, registra como la última unidad laborada en
          el lapso {{strftime("%d-%B-%Y", strtotime($dataTiempos->fecha_ult_traslado))}} a la fecha, en el (la) {{$dataTiempos->unidad_laboral}}, ubicado en la ciudad de Bogotá, Distrito
          Capital (Cundinamarca), ostentando el cargo de {{$cargoData->cargo}}. 
          @endif
          </p>
          <br>          
          </div>
          <div>          
            <p class="obs">Se expide la presente constancia. Dada a los {{$datosGenerales['fechaLetras']}} en la ciudad
              de Bogotá D.C.
            </p>
          </div>
          <div>
          <p class="lateralFirma">Firmado digitalmente por: MINISTERIO DE DEFENSA NACIONAL <br>
          Organización: <br>
          Fecha firma : {{$datosGenerales['fechaActual']}}
           <p>
          </div>
          <div class="divFirma">
            <img class= "img_firma" src="{{$datosGenerales['firma']}}" alt="Logo" />
            <hr>
            <p class="frima">
            <strong>{{$datosFirmante->grado}} {{$datosFirmante->nombre_apellidos}}</strong>
            </p>
            <p class="frima">
            <strong>DIRECTOR DE PERSONAL DIPER FUERZA AÉREA COLOMBIANA</strong>
            </p>
          </div> 
          <div class="pietext">
          <p class="textURLPIE">Señores Entidades Externas para validar este certificado puede copiar este código hash: {{$idDocumento}}
          y lo puede validar en ruta {{$_SERVER['HTTP_ORIGIN']}}/search</p>
          </div>        
         
          <div class="containerImgPie">          
           <img class= "img_P2" src="{{$datosGenerales['base64LogoPie']}}" alt="Logo" /> 
          </div>        
          </td>          
        </tr>           
     </table>     
  </body>
</html>