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
 </head>
 <body class="hold-transition sidebar-mini">
 <div class="wrapper">

   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
     </ul>
   </nav>
   <!-- /.navbar -->

   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index.php?view=landing_page" class="brand-link">
       <img src="dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
       <span class="brand-text font-weight-light">Cable Sur Digital S.R.L</span>
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
            </ul>
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
             <a href="main.php?view=nuevo_cobro" class="nav-link">
               <i class="nav-icon fas fa-hand-holding-usd"></i>
               <p>Realizar un Cobro</p>
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
     <div class="content">
       <div class="container-fluid pt-2" id="content-data">

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
   <footer class="main-footer">
     <!-- To the right -->
     <div class="float-right d-none d-sm-inline">
       CABLE SUR DIGITAL S.R.L
     </div>
     <!-- Default to the left -->
     <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
   </footer>
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

 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

 <!-- Librerias para cargar vistas en el dashboard -->
 <script src="dist/js/loadweb.js"></script>
 <script>
   $(document).ready(function (){
     var content = getParam('view');
     if(content == false){
       // El usuario ingreso al dashboard y
       // No ha seleccionado una de las opciones del SIDEBAR
       $("#content-data").load('views/landing_page.php');
     }
     else{
       // La vaieable view tiene un valor (archivo que se desea abrir)
       $("#content-data").load('views/' + content + '.php');
     }
   });
 </script>
 </body>
 </html>
