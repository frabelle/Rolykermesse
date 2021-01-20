<?php
    error_reporting(0);
    include '../entidades/vw_tasacambio.php';
    include '../datos/Dt_vw_tasacambio.php';

    $datosTasaC = new Dt_vw_tasacambio();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tasas de Cambio - ROLY</title>
        <link href="css/styles.css" rel="stylesheet" />
        <!-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" /> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script> -->

        <!-- Datatable -->
        <link href="DataTables/DataTables-1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

        <!-- Datatable Buttons -->
        <link href="DataTables/Buttons-1.6.3/css/buttons.dataTables.min.css" rel="stylesheet">

    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        &nbsp;&nbsp;&nbsp;

        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand" href="index.html">R O L Y</a>

            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Buscar por..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Inicio</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Cerrar Sesión</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">Home</div>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Inicio
                        </a>

                        <div class="sb-sidenav-menu-heading">Arqueo de Caja</div>
                        <a class="nav-link" href="vw_ArqueoCaja.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-cash-register"></i></div>
                            Gestión de Caja
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                            <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-usd"></i></div>
                            Gestión de Moneda
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="tbl_moneda.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-coins"></i></div>
                                    Moneda</a>
                                <a class="nav-link" href="vw_denominacion.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-donate"></i></div>
                                    Denominación</a>
                                <a class="nav-link" href="tbl_tasaCambio.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-file-invoice-dollar"></i></div>
                                    Tasa de Cambio</a>
                            </nav>
                        </div>
                    </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Gestión de Monedas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                            <li class="breadcrumb-item ">Gestión de Moneda</li>
                            <li class="breadcrumb-item active">Tasa de Cambio</li>
                        </ol>
                        <div class="card mb-4">
                        <img src="../src/assets/img/monedas-banner.jpg" class="card-img-top" alt="moneda">

                            <div class="card-body">

                                <div class="table-responsive">

                                    <h2>Registro de Tasas de Cambio</h2>

                                    <div style="text-align: right;">

                                     <a href="NewTasaCambio.php">
                                        <button type="button" class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-plus"></i> Agregar nuevo periodo
                                        </button>
                                     </a><br><br>

                                    </div>

                                    <table class="table table-bordered table-hover" id="tbl" width="100%" style="text-align: center;" cellspacing="0">
                                    
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>Moneda Origen</th>
                                                <th>Moneda Cambio</th>
                                                <th>Mes</th>
                                                <th>Año</th>
                                                <th width="25%">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($datosTasaC->listarTasaC() as $r): ?>
                                                <tr>
                                                    <td><?php echo $r->__GET('id_tasaCambio');?></td>
                                                    <td><?php echo $r->__GET('original');?></td>
                                                    <td><?php echo $r->__GET('cambio');?></td>
                                                    <td><?php echo $r->__GET('mes');?></td>
                                                    <td><?php echo $r->__GET('anio');?></td> 
                                                    
                                                    <td>

                                                        <a href="vw_tasacambiodet.php?view=<?php echo $r->__GET('id_tasaCambio'); ?>" 
                                                        title="Visualizar datos de tasa de cambio">
                                                            <i class="fas fa-eye"></i>
                                                            Ver
                                                        </a>

                                                        &nbsp;

                                                        <a href="EditTasaCambio.php?editT=<?php echo $r->__GET('id_tasaCambio'); ?>" 
                                                        title="Modificar los datos de la tasa de cambio">
                                                            <i class="fas fa-pencil-alt"></i>
                                                            Editar
                                                        </a>

                                                        &nbsp;

                                                        <a href="EditEmpleado.php?editE=<?php echo $r->__GET('employee_id'); ?>" 
                                                        title="Elimina los datos de la tasa de cambio">
                                                            <i class="fas fa-trash-alt"></i>
                                                            Eliminar
                                                        </a>

                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    <tfoot class="thead-dark">
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; ROLY 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>

        <!-- Plugin Fontawesome -->
        <script src="fontawesome-free-5.15.1/js/all.min.js"></script>

        <!-- Datatable -->
        <script src="DataTables/DataTables-1.10.21/js/jquery.dataTables.js"></script>

        <!-- Datatable Buttons -->
        <script src="DataTables/Buttons-1.6.3/js/dataTables.buttons.min.js"></script>

        <!-- Datatable Buttons Print -->
        <script src="DataTables/Buttons-1.6.3/js/buttons.html5.min.js"></script>
        <script src="DataTables/Buttons-1.6.3/js/buttons.print.min.js"></script>

        <!-- Datatable Buttons PDF -->
        <script src="DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
        <script src="DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>

        <!-- Datatable Buttons Excel -->
        <script src="DataTables/JSZip-2.5.0/jszip.min.js"></script>

        <!-- <script>
            $(document).ready(function()
            {
                //Aplicamos formato y botones a la tabla
                $('#tblEmp').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'pdf',
                        'excel',
                        'print'
                    ]
                });
            });
        </script> -->

        <script>
            $(document).ready(function() 
            { 
                $('#tbl').DataTable( { 
                    dom: 'Bfrtip',
                    buttons: [ { 
                        extend: 'pdf',text: '<i class="fas fa-file-pdf" style="margin-right:10px"></i>Descargar como PDF', titleAttr: 'PDF' } , 
                        { extend: 'excel', text: '<i class="fas fa-file-excel" style="margin-right:10px"></i>Descargar como Excel', titleAttr: 'Excel' },
                        { extend: 'print', text: '<i class="fas fa-print" style="margin-right:10px"></i>Imprimir tabla', titleAttr: 'Imprimir' } 
                    ],
                   
                    initComplete: function () {
                        var btns = $('.dt-button');
                        btns.addClass('btn btn-outline-primary btn-sm');
                        btns.removeClass('dt-button');
                    }
                } ); 
            } );
            
        </script>

        <!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="assets/demo/datatables-demo.js"></script> -->
    </body>
</html>
