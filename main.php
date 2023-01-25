<?php
require_once 'views/acceso-seguro.php';
 ?>

 <html lang="es">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>CABLE SUR DIGITAL S.R.L</title>

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome Icons -->
   <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="dist/css/adminlte.min.css">

   <!--Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <!--estilos login-->
   <link rel="stylesheet" href="dist/css/login.css">
   <!-- En esta sección va todas los estilo -->
   <!-- data table -->
  <!-- data table -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="dist/css/carga.css">
  <link rel="stylesheet" href="dist/css/datetime.css">
 </head>
 <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
 <div class="wrapper">

   <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
      <!-- <div class="content-xbox">
        <div class="loader-xbox"></div>
      </div> -->
      <div class="content-loader-pro">
        <div class="loader"></div>
        <span>Cargando...</span>
      </div>
    </div>

   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
       <li class="nav-item">
         <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
         <a href="index3.html" class="nav-link">Inicio</a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
         <a href="#" class="nav-link">Contactos</a>
       </li>
       <div class="oclock ml-4 hidden-xs ">
          <span id="time"></span>
        </div>
     </ul>
   </nav>
   <!-- /.navbar -->

   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="main.php?view=landing-page" class="brand-link">
       <img src="dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
       <span class="brand-text font-weight-light">Cable Sur Digital</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">

       <!-- Sidebar user panel (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="info">
           <a href="#" class="d-block">
             <?php echo $_SESSION['nombres'] . ' ' . $_SESSION['apellidos']; ?>
           </a>
         </div>
       </div>

       <!-- Sidebar Menu -->
       <nav class="mt-3">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Personas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="main.php?view=usuarios-activos" class="nav-link">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>Usuarios Activos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="main.php?view=usuarios-inactivos" class="nav-link">
                  <i class="nav-icon fas fa-user-alt-slash"></i>
                  <p>Usuarios Inactivos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="main.php?view=personas" class="nav-link">
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>Lista de Personas</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- operaciones distritos -->
          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>
                Distritos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="main.php?view=clientes.activos.morochucos" class="nav-link">
                  <i class="nav-icon fas fa-search-location"></i>
                  <p>Los Morochucos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="main.php?view=clientes.activos.sanmiguel" class="nav-link">
                <i class="nav-icon fas fa-search-location"></i>
                  <p>San Miguel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="main.php?view=clientes-inactivos" class="nav-link">
                <i class="nav-icon fas fa-search-location"></i>
                  <p>Clientes Inactivos</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- desplegable de contratos -->
          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                CONTRATOS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="main.php?view=contratos-activos" class="nav-link">
                  <i class="nav-icon fas fa-search-location"></i>
                  <p>Activos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="main.php?view=contratos-inactivos" class="nav-link">
                <i class="nav-icon fas fa-search-location"></i>
                  <p>Inactivos</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-close">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>
                PLANES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="main.php?view=planes-activos" class="nav-link">
                  <i class="nav-icon fas fa-search-location"></i>
                  <p>Activos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="main.php?view=planes-inactivos" class="nav-link">
                <i class="nav-icon fas fa-search-location"></i>
                  <p>Inactivos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="main.php?view=direcciones" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>Direcciones</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="main.php?view=operaciones" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>Operaciones</p>
            </a>
          </li>
          <li class="nav-item">
             <a href="main.php?view=pagos" class="nav-link">
               <i class="nav-icon fas fa-user-circle"></i>
               <p>Pagos</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="main.php?view=cobranza" class="nav-link">
               <i class="nav-icon fas fa-user-circle"></i>
               <p>Lista de Cobranza</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="main.php?view=buscar-cliente" class="nav-link">
               <i class="nav-icon fas fa-user-circle"></i>
               <p>Buscar Cliente</p>
             </a>
           </li>

           <!-- Opciones personalizadas -->
           <li class="nav-item">
             <a href="main.php?view=contactos" class="nav-link">
               <i class="nav-icon fas fa-user-circle"></i>
               <p>Contactos</p>
             </a>
           </li>
           
           <!-- /. Opciones personalizadas -->

           <li class="nav-item">
             <a href="main.php?view=nosotros" class="nav-link">
               <i class="nav-icon fas fa-users-cog"></i>
               <p>Nosotros</p>
             </a>
           </li>

           <li class="nav-item">
             <a href="main.php?view=estadistica" class="nav-link">
               <i class="nav-icon fas fa-hand-holding-usd"></i>
               <p>Estadistica</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="controllers/usuario.controller.php?operacion=cerrar-sesion" class="nav-link">
               <i class="nav-icon fas fa-hand-holding-usd"></i>
               <p>Cerrar Cuenta</p>
             </a>
           </li>
         </ul>
       </nav>
       <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
   </aside>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">

     <!-- Main content -->
     <div class="container">
       <div class="container-fluid" id="content-data">

         <!-- Esta sección se carga de forma dinamica -->

       </div><!-- /.container-fluid -->
     </div>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->

   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
     <!-- Control sidebar content goes here -->
     <div class="p-3">
       <h5>Title</h5>
       <p>Sidebar content</p>
     </div>
   </aside>
   <!-- /.control-sidebar -->
   <!-- Main Footer -->


 </div>
 <!-- ./wrapper -->

 <!-- REQUIRED SCRIPTS -->

 <!-- jQuery -->
 <script src="plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


 <!-- AdminLTE App -->
 <script src="dist/js/adminlte.min.js"></script>

 <!-- ChartJS -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
 <script src="dist/js/colors-chart.js"></script>
 <script src="dist/js/option-chart.js"></script>
 <script src="dist/js/getdatetime.js" charset="utf-8"></script>

 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

 <!-- Librerias para cargar vistas en el dashboard -->
 <script src="dist/js/loadweb.js"></script>

 <!-- Data Table -->
 <script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

 <script src="dist/js/dataTableConfig.js" charset="utf-8"></script>

 <!-- PARA CARGAR EL CHART.JS -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs/dist/tf.min.js"> </script>
 <script>
   $(document).ready(function (){
     var content = getParam('view');
     if(content == false){
       // El usuario ingreso al dashboard y
       // No ha seleccionado una de las opciones del SIDEBAR
       $("#content-data").load('views/landing-page.php');
     }
     else{
       // La vaieable view tiene un valor (archivo que se desea abrir)
       $("#content-data").load('views/' + content + '.php');
     }
   });
 </script>
 </body>
 </html>
