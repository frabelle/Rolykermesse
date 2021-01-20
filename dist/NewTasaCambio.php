<?php
    error_reporting(0);
    include '../entidades/tbl_Denominacion.php';
    include '../entidades/tbl_moneda.php';
    
    include '../datos/Dt_tbl_Denominacion.php';
    include '../datos/Dt_tbl_moneda.php';

    $datosDeno = new Dt_tbl_Denominacion();
    $datosMone = new Dt_tbl_moneda();
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
                        <h1 class="mt-4">Gestión de Moneda</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                            <li class="breadcrumb-item "><a href="#">Gestión de Moneda</a></li>
                            <li class="breadcrumb-item "><a href="vw_denominacion.php">Denominación</a></li>
                            <li class="breadcrumb-item active">Registrar un Periodo</li>
                        </ol>
                        <div class="card mb-4">
                            <img src="https://miviajeanewyork.files.wordpress.com/2016/02/monedas-banner.jpg?w=1390" class="card-img-top" alt="moneda">

                            <div class="card-body">

                                <div class="table">
                                
                                    <h2>Registrando un nuevo periodo</h2>

                                    <div style="text-align: right;">
                                        <a href="tbl_tasaCambio.php" title="Regresar a la página anterior">
                                            <i class="fas fa-arrow-circle-left"></i>
                                            Regresar a la página anterior
                                        </a><br><br>
                                    </div>
                                    
                                    <form method="POST" action="../negocio/NgEmpleado.php">
                                        <div class="form-row">
                                            <div class="col-md-12" >

                                                <div class="row">

                                                    <div class="col">
                                                        <label class="small mb-1" >Moneda de Origen: </label>
                                                        <select class="form-control" name="moneda" id="moneda" required>
                                                            <option value="">Seleccione...</option>
                                                            <?php foreach($datosMone->cbxMoneda() as $r): ?>
                                                            <option value="<?php echo $r->__GET('id_moneda'); ?>" ><?php echo $r->__GET('nombre') ?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>

                                                    <div class="col">
                                                        <label class="small mb-1" >Moneda de Cambio: </label>
                                                        <select class="form-control" name="moneda" id="moneda" required>
                                                            <option value="">Seleccione...</option>
                                                            <?php foreach($datosMone->cbxMoneda() as $r): ?>
                                                            <option value="<?php echo $r->__GET('id_moneda'); ?>" ><?php echo $r->__GET('nombre') ?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col">
                                                        <label class="small mb-1" >Mes: </label>
                                                        <select class="form-control" name="mes" id="mes" required>
                                                            <option value="">Seleccione...</option>
                                                            <option value="1">Enero</option>
                                                            <option value="2">Febrero</option>
                                                            <option value="3">Marzo</option>
                                                            <option value="4">Abril</option>
                                                            <option value="5">Mayo</option>
                                                            <option value="6">Junio</option>
                                                            <option value="7">Julio</option>
                                                            <option value="8">Agosto</option>
                                                            <option value="9">Septiembre</option>
                                                            <option value="10">Octubre</option>
                                                            <option value="11">Noviembre</option>
                                                            <option value="12">Diciembre</option>
                                                        </select>
                                                    </div>

                                                    <div class="col">
                                                        <label class="small mb-1" >Año: </label>
                                                        <input class="form-control" name="anio" id="anio"
                                                        type="number" placeholder="Año" title="Ingrese el año" required/>
                                                        <input type="hidden" id="txtaccion" name="txtaccion" value="1"/>
                                                    </div>

                                                </div>

                                                <br>

                                                <div class="card mb-4">

                                                    <div class="card-body"> 

                                                        <h4>Detalle de tasas de cambio del periodo</h4>

                                                        <br>

                                                        <div class="row">

                                                            <div class="col">
                                                                <label class="small mb-1" >Fecha de Tasa: </label>
                                                                <input class="form-control" name="fecha" id="fecha"
                                                                type="date" placeholder="Ejemplo: dd/MM/yyyy" title="Ingrese una fecha válida!" required/>
                                                            </div>

                                                            <div class="col">
                                                                <label class="small mb-1" >Tasa de Cambio: </label>
                                                                <div class="input-group mb-3">
                                                                    <input class="form-control" name="tasaC" id="tasaC" type="number" step='1.00' 
                                                                    value='0.00' placeholder="0.00" title="Ingrese la tasa de cambio" required/>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <label class="small mb-1" ></label>
                                                                <button type="button" onclick="agregarFila()" class="btn btn-outline-primary btn-block">
                                                                    <i class="fas fa-plus"></i> Agregar</button>

                                                            </div>

                                                        </div><br>

                                                        <div class="table-responsive">

                                                            <table class="table table-bordered table-hover" name="tablaprueba" id="tablaprueba" width="50%" style="text-align: center;" cellspacing="0">
                                                            
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th>Fecha</th>
                                                                        <th>Tipo de cambio</th>
                                                                        <th width="15%">Acción</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr></tr>
                                                                </tbody>
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="form-group">
                                                    <div class="form-row" style="text-align: center;">
                                                        
                                                        <div class="col-md-6">
                                                            <input class="btn btn-primary btn-block" type="submit" value="Registrar nuevo periodo"/>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <input class="btn btn-outline-danger btn-block" type="reset" value="Cancelar"/>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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

        <!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="assets/demo/datatables-demo.js"></script> -->

        <script>
            function agregarFila(){
                 
                var tas =  $('#tasaC').val();
                var fec = $('#fecha').val();

                 document.getElementById("tablaprueba").insertRow(-1).innerHTML = 
                 '<td>'+ fec +'</td>'+
                 '<td>'+ tas +'</td>' + 
                 '<td><button type="button" class="btn btn-sm btn-danger borrar"><i class="fas fa-trash-alt"></i></button></td>';
                
            }

            function eliminarFila () {
                $(document).on('click', '.borrar', function (event) {
                    event.preventDefault();
                    $(this).closest('tr').remove();
                });
            }
        </script>

        <script>
            $(document).ready(function(){
                
                eliminarFila();
            })
        </script>







    </body>
</html>
