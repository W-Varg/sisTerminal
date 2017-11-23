
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
  <body class="skin-blue sidebar-mini sidebar-collapse">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Sis</b>T</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sis-Terminal</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">

          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>

          {!! Form::open(array('url'=>'/','method'=>'GET','autocomplete'=>'off','role'=>'search','class'=>'navbar-form navbar-left')) !!}
	          <div class="form-group">
	            <input type="text" class="form-control" name="searchText" placeholder="Buscar..." >
	          </div>
	          <button type="submit" class="btn btn-default">Buscar</button>
	        {{Form::close()}}

          <!-- Navbar Right Menu -->
          <ul class="nav navbar-nav navbar-right">
            
                  <!--a class="dropdown-toggle" data-toggle="modal" data-target="#ModalRegistrarse">registrarse</a-->
                <li><a href="" class="dropdown-toggle" data-toggle="modal" data-target="#ModalIngresar">
                  <span class="glyphicon glyphicon-log-in" ></span> Login</a>
                </li>
            
          </ul>
          <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
				

              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small>Online</small>
                  <!--span class="hidden-xs">usuario</span-->
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>


 <div class="modal modal fade" id="ModalIngresar" >
  <div class="modal-dialog ">
  <div class="modal-content">
        <!---emcabezado de modal-->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">cerrar</span>
            </button>
            <h2 class="modal-title">Cuenta Personal</h2> 
          </div>
          <!--contenido de la ventana-->
          <div class="modal-body">
           <form class="form" method="Post" action="{{URL::action('ViajeRutaController@index')}}">
           	
              <div class="form-group"><input type="text" name="username" class="form-control" placeholder="Nombre de Usuario"></div><br>
              <div class="form-group"><input type="password" class="form-control" name="password" placeholder="Contraseña"></div>
              <div class="form-group"> <button type="submit" class="btn btn-primary btn-block">Ingresar</button></div>
            
            </form>

          </div>
          <!--footer del modal-->
           
  </div>

  </div>
</div><!--final modal login -->

       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-lg-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Pasajes Online</h3>
                  
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row" style="float:left; margin-left:  4%;">
	                  	<div class="col-lg-12">

						      <h3>Reservar en el Bus : {{ $Ruta_id->origen }}</h3>
						      		
						            
						            <div class="form-group">
						              
						                @foreach ($buses as $bus)
						                  @if($bus->id==$Ruta_id->bus)
							              <label for="viajebus"  >Tipo de Bus {{ $bus->tipoBus }} - {{ $bus->plazas }} - {{ $bus->placa }} </label>
							              <?php  $asientos=$bus->plazas;
                                 
                             ?>
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
						              <label for="fecha_viaje">Fecha de Salida</label>
						              <input type="date" value="{{ $Ruta_id->fecha_viaje }}" disabled="true"  name="fecha_viaje"  required="" class="form-control">
						            </div>
						    
						      <div class="form-group">
						              <label for="precio_pasaje">Precio de Pasaje</label>
						              <input type="number" disabled="true" value="{{ $Ruta_id->precio_pasaje }}" name="precio_pasaje" min="0" required="" class="form-control">
						            </div>
						    
						      <div class="form-group">
						              
						            @foreach ($origen as $des)
						              @if($des->id_destino==$Ruta_id->origen)
						              <label for="destino_terminal">Origen: {{ $des->NombreDestino }}</label>
						              @endif
						            @endforeach
						          
						          </div>
						    
						      <div class="form-group">
						              <label for="hora_salida">Hora de Salida</label>
						              <input type="time" disabled="true" value="{{ $Ruta_id->hora_salida }}" name="hora_salida"  class="form-control">
						            </div>
						    
						      <div class="form-group">
						              <label for="carril_salida">Carril de Salida</label>
						              <input type="number" disabled="true" value="{{ $Ruta_id->carril_salida }}" name="carril_salida" min="0" max="60"  class="form-control" >
						            </div>
						    
						      <div class="form-group">
						              <label for="hora_llegada">Hora de Llegada</label>
						              <input type="time" value="{{ $Ruta_id->hora_llegada }}" name="hora_llegada"  disabled="true" class="form-control">
						            </div>
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">

						      

                        </div>
                  	</div>

                  	<div class="row" style="float:right; margin-right:  10%;">
	                  	<div class="col-md-12">
            <div class="well well-sm">
              <div class="form-horizontal">
                	{!!Form::model($Ruta_id,['method'=>'PATCH','route'=>['principal.update',$Ruta_id->id_viajeRuta]])!!}
                    {{Form::token()}}
                    <fieldset>
                        <legend class="text-center header">Reservacion</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="nombre" type="text" placeholder="Nombre.. " class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="lname" name="apellido" type="text" placeholder="Apellido" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input name="asiento" type="number" min="0" placeholder="asiento" class="form-control">
                            </div>
                            
                              
                            
                        </div>
						
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Reservar</button>
                            </div>
                        </div>
                    </fieldset>
               {!!Form::close()!!}
               </div>
            </div>
        </div> 
	                  </div>
                  	<div class="row" style="float:left; margin-left: 7%; margin-top: 1%;">
	                  	<div class="col-lg-12">
	                  			<table class="table table-striped " border="2" cellspacing="0" >
	                  				<tr><td colspan="5" >Asientos distribuidos en el Bus</td></tr>




                            <!-->recuperamos los asientos<-->
                            @foreach($asientosOcupados as $ocu)
                              <label for="destino_terminal">{{ $ocu->asiento }}</label><br>
                            @endforeach
                            
        <?php

        $a=0; 
        $b=0; 
        $c=0; 
        $d=0; 
        $num_places=$asientos;

        while ($a < $num_places)
        { 
          echo "<tr>";
          $a++;

             echo "<td><input class='btn btn-default' with='100%' type='button' value='V N°".$a."' ></td>";  $c++;
             //Grupo (a) asientos impares ventana izquierdo  
             if ($c < $num_places)
             { 
                $a++; 
                echo "<td><input class='btn btn-default' type='button' value=' N°".$a."' ></td>";  $c++;
                    //Grupo (b) aientos pares pasillo central izquierdo 
             } echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> ";  
             if ($c < $num_places)
             { 
                $a=$a+2; 
                 echo "<td><input class='btn btn-default' type='button' value='P N°".$a."' ></td>";  $c++;
             //Grupo (c) aientos pares pasillo central derecho 
             } 
             $a=$a-1; 
             if ($c < $num_places){ 
             echo "<td><input class='btn btn-default' type='button' value='V N°".$a."' ></td>";  $c++;
             //Grupo (d) aientos impares ventana derecho      
             } 
             $a=$a+1;
             echo "</tr>";
        } 
        ?>
							      </table>
                        </div>
                  	</div>
                </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->

      
      <!-- jQuery 2.1.4 -->
      <script src="{{asset('js/jquery-3.2.1.js')}}"></script>
      <!-- Bootstrap 3.3.5 -->
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <!-- AdminLTE App -->
      <script src="{{asset('js/app.min.js')}}"></script>
      <!-- pooper 3.3.5 -->

  </body>
</html>

