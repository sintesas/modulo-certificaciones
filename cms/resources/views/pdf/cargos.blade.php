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
        width:70px;
        box-sizing: border-box;
      }
      .td23{       
        width:90px;
        box-sizing: border-box;
      }
      .td22{       
        width:30px;
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
        width: 150px;
        height:80px;
        object-fit: contain;
        margin-right: 12%;
      }

      .containerImgPie{
        text-align: center;
        margin-left: 18%;
        margin-top: 2%;
      }
      
      th{
        border-bottom-style: solid;
        border-collapse: collapse;
        text-align: left;
      }

      /* .table1{
        border-bottom-style: solid;
        border-collapse: collapse;       
        width:88%;
        margin-left:20%;
      } */
      .table1{
        border-bottom-style: solid;
        border-collapse: collapse;
        width: 100%;
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

      .salto {
  page-break-after: always;
  border: 0;
  margin: 0;
  padding: 0;
}

.td20{       
        width:200px;
        box-sizing: border-box;
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
            <img class= "escudo" src="{{$datosGenerales['logo']}}" alt="Logo" />
          </div>
          <div>
          <img class="imgCode" src="data:image/png;base64,{{DNS2D::getBarcodePNG($idDocumento, 'PDF417')}}" alt="Bacode" />
          <p class="lateralCode">Identificador :{{ $idDocumento}} (Válido indefinidamente)<p><div>
          <p class="lateralUrl">URL:{{$_SERVER['HTTP_ORIGIN']}}/search<p>
          
          </div><h5 style="margin-top: -20%;"></h5>
          <br>
          <br>
          <br>
          <h5 style="margin-top: -9%;font-size: 13px;"> FUERZA AÉREA COLOMBIANA</h5>
          <h5 style="margin-top: -20%;"></h5>
          <br>
          <h5 style="margin-top: -8%;font-size: 13px;">EL (LA) SUSCRITO(A) DIRECTOR DE PERSONAL DIPER</h5>
          <br>
          <h4 style="margin-top: -4.5%;">HACE CONSTAR</h4>
          <p class="texto">
            Que el(la) Señor(a)(ita) ({{$dataCC[0]->grado_actual}}) {{$dataCC[0]->apellidos_nombres}} identificado con CC No. {{$dataCC[0]->identificacion}}. ingresó a FUERZA AÉREA COLOMBIANA
            desde el {{$fecha_inicio}} y a la fecha desempeñó los siguientes cargos, así:
          </p>                    
          </div>

          <div style="margin-left: 11px%;"> 
            <table class="table1 center">
              <tr>
              <th>GR</th>
              <th>CARGO</th>
              <th>UNIDAD DEPENDENCIA</th>
              <th> INICIO </th>
              <th>TERMINO</th>
              </tr>
             
              @foreach ($dataCC as $key=>$cc  ) 
              
              @if($key == 5)
              <div class="salto"></div>
              @endif
                <tr>
                  <td class="td22">{{$cc->grado_cargo}}</td> 
                  <td class="td23">{{$cc->cargo}}</td>
                  <td class="td20">{{$cc->dependencia_cargo}}</td>
                  <td class="td2">{{date("d-m-Y", strtotime($cc->fecha_inicio))}}</td>
                  @if($cc->fecha_termino == '')
                    <td></td>
                  @else
                  <td class="td2"> {{date("d-m-Y", strtotime($cc->fecha_termino))}}</td>
                  @endif
                </tr>
               
              @endforeach   
              
            </table> 
            <br>                      
          </div>
          <p class="nota">Los datos aquí contenidos son los registros en su historial laboral. Se expide la presente constancia.
            Dada a los {{$datosGenerales['fechaLetras']}} en la ciudad de Bogotá D.C. Caducidad 30 días a partir de la fecha.</p>
          <div>
          <p class="lateralFirma">Firmado digitalmente por: MINISTERIO DE DEFENSA NACIONAL <br>
          Organización: <br>
          Fecha firma : {{$datosGenerales['fechaActual']}}
           <p>           
          </div>
            <br>
            <div class="containerImgPie">          
          <img class= "img_P3" src="{{$datosGenerales['fotoPie']}}" alt="Logo" />
          </div>     
          <div class="divFirma">            
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

          <div class="containerImgPie2">          
           <img class= "img_P2" src="{{$datosGenerales['base64LogoPie']}}" alt="Logo" /> 
          </div>
                          
          </td>          
        </tr>           
     </table>
     
  </body>
</html>