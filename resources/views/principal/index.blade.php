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
	            <input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
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
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Pasajes Online</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="clearfix">
			<div class="pagination-container clearfix">
               @foreach ($viajeRutas as $cat)
               
			
				<div class='col-sm-3'>
						<div class='panel panel-default'>
							<div class='panel-heading'>{{ $cat->destino }}</div>
							<div class='panel-body p-0 p-b'>
								<a href='%s'>
									<img src='%s' width='%s' class='img-responsive'>
								</a>
								<div class='list-group m-0'>
									<div class='list-group-item b-0 b-t'>
										<i class='fa fa-calendar-o fa-2x pull-left ml-r'></i>
										<p class='list-group-item-text'> Precio</p>
										<h4 class='list-group-item-heading'>bs.{{ $cat->precio_pasaje }}</h4>
									</div>
									<div class='list-group-item b-0 b-t'>
										<i class='fa fa-calendar fa-2x pull-left ml-r'></i>
										<p class='list-group-item-text'>Disponible</p>
										<h4 class='list-group-item-heading'>{{ $cat->fecha_viaje }}</h4>
									</div>
								</div>
							</div> 
							<div class='panel-footer'>
								<a href='' data-target="#modal-detalle-{{$cat->id_viajeRuta}}" data-toggle="modal" class='btn btn-default btn-block'>Detalle Producto</a>

								<a href="{{URL::action('PrincipalController@edit',$cat->id_viajeRuta)}}"  class='btn btn-primary btn-block'>Reservar</a>

							</div>
						</div>
					</div>
			
				@include('principal.detalle')
				@endforeach
		</div>
			
		{{$viajeRutas->render()}}
	</div>
	
</div>

</div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

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
      <script src="{{asset('js/popper.min.js')}}"></script>
    </div>
  </body>
</html>
