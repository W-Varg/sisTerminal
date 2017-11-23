<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SisTerminal</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

  </head>
<style>.nota{color: red;}</style> :
<body>
<br><br>
	<div class="col-md-5 col-md-offset-3 panel panel-default"><br>
		<div class="panel-body">
			<H2 class="text-center">FELICIDADES RECERVO EXITOSAMENTE</H2>
			<div class="container">
				<div class="form-group">
						              
						                @foreach ($buses as $bus)
						                  @if($bus->id==$Ruta_id->bus)
							              <label for="viajebus"  >Tipo de Bus {{ $bus->tipoBus }} - asiento: {{ $objeto->asiento }} - Placa: {{ $bus->placa }} </label>
							              
							            @endif
							          @endforeach
						        
						            </div>
						      
						            <div class="form-group">

						                @foreach ($conductor as $con)
						            @if($con->id_conductor==$Ruta_id->conductor)
						              <label for="viajeconductor"> Conductor : {{ $con->nombre }}</label>
						            @endif
						          @endforeach
						        
						            </div>
						            <div class="form-group">
						              
						            @foreach ($destino as $des)
						              @if($des->id_destino==$Ruta_id->destino_terminal)
						              <label for="destino_terminal">Destino: {{ $des->NombreDestino }}</label>
						              @endif
						            @endforeach
						          
						            </div>
						            <div class="form-group">
						              <label for="fecha_viaje">Fecha de Salida : {{ $Ruta_id->fecha_viaje }}</label>
						              
						            </div>
						    
						      <div class="form-group">
						              <label for="precio_pasaje">Precio de Pasaje: {{ $Ruta_id->precio_pasaje }}</label>
						              
						            </div>
						    
						      <div class="form-group">
						              
						            @foreach ($origen as $des)
						              @if($des->id_destino==$Ruta_id->origen)
						              <label for="destino_terminal">Origen: {{ $des->NombreDestino }}</label>
						              @endif
						            @endforeach
						          
						          </div>
						    
						      <div class="form-group">
						              <label for="hora_salida">Hora de Salida: {{ $Ruta_id->hora_salida }}</label>
						            </div>
						    
						      <div class="form-group">
						              <label for="carril_salida">Carril de Salida: {{ $Ruta_id->carril_salida }}</label>
						              
						            </div>
						    
						      <div class="form-group">
						              <label for="hora_llegada">Hora de Llegada: {{ $Ruta_id->hora_llegada }}</label>
						            </div>
				<p class="nota">NOTA: Debe presentarse una media hora antes</p>
				<button class="btn btn-success">Imprimir</button>
<a href="/">				<button class="btn btn-danger">Volver</button></a>
			</div>
		</div>
	</div>
	<div class="row" style="float:left; margin-left:  4%;">
	                  	<div class="col-lg-12">
              </div>
                  	</div>

<!-- jQuery 2.1.4 -->
      <script src="{{asset('js/jquery-3.2.1.js')}}"></script>
      <!-- Bootstrap 3.3.5 -->
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <!-- AdminLTE App -->
      <script src="{{asset('js/app.min.js')}}"></script>
      <!-- pooper 3.3.5 -->
      <script src="{{asset('js/popper.min.js')}}"></script>
    </div>
  </body>
</html>