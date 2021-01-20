<?php
    //error_reporting(0);
    
    //Entidades
    include '../entidades/tbl_Denominacion.php';
    include '../entidades/tbl_moneda.php';
    
    //Datos
    include '../datos/Dt_tbl_Denominacion.php';
    include '../datos/Dt_tbl_moneda.php';

    //Instancias
    $datosDeno = new Dt_tbl_Denominacion();
    $datosMone = new Dt_tbl_moneda();

    $varId = $_GET['editD'];
    $den = $datosDeno->obtenerDenominacion($varId);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Denominaciones - ROLY</title>
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
                            <li class="breadcrumb-item active">Editando una Denominación</li>
                        </ol>
                        <div class="card mb-4">
                            <img src="https://miviajeanewyork.files.wordpress.com/2016/02/monedas-banner.jpg?w=1390" class="card-img-top" alt="moneda">

                            <div class="card-body">

                                <div class="table">
                                
                                    <h2>Editando una denominación</h2>

                                    <div style="text-align: right;">
                                        <a href="vw_denominacion.php" title="Regresar a la página anterior">
                                            <i class="fas fa-arrow-circle-left"></i>
                                            Regresar a la página anterior
                                        </a><br><br>
                                    </div>
                                    
                                    <form method="POST" action="../negocio/NgDenominacion.php">
                                        <div class="form-row">
                                            <div class="col-md-12" >

                                                <div class="row">

                                                <input type="hidden" name="idD" id="idD" />

                                                    <div class="col">
                                                        <label class="small mb-1" >Moneda: </label>
                                                        <select class="form-control" name="moneda" id="moneda" required>
                                                            <option value="">Seleccione...</option>
                                                            <?php foreach($datosMone->cbxMoneda() as $r): ?>
                                                            <option value="<?php echo $r->__GET('id_moneda'); ?>" ><?php echo $r->__GET('nombre') ?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                        <input type="hidden" id="txtaccion" name="txtaccion" value="2"/>
                                                    </div>

                                                    <div class="col">
                                                        <label class="small mb-1" >Valor de la moneda: </label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend" id="simbolo" name="simbolo">
                                                            <span class="input-group-text" id="simbol" name="simbol">N/A</span>
                                                            </div>
                                                            <input class="form-control" name="valor" id="valor" type="number" step='0.01' 
                                                            value='0.00' placeholder="0.00" title="Ingrese su salario" min="0.01" required/>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                        <label class="small mb-1" >Valor en letras: </label>
                                                        <input class="form-control" style="text-transform:uppercase;" 
                                                        onkeyup="javascript:this.value=this.value.toUpperCase();" name="valorLetras" id="valorLetras"
                                                        type="text" placeholder="Ejemplo: DIEZ CÓRDOBAS" title="Ingrese el valor en letras" required/>
                                                </div>

                                                <br>

                                                <div class="form-group">
                                                    <div class="form-row" style="text-align: center;">
                                                        
                                                        <div class="col-md-6">
                                                            <input class="btn btn-primary btn-block" type="submit" value="Guardar cambios"/>
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
            function setValores()
            {
                $("#idD").val("<?php echo $varId ?>");
                $("#moneda").val("<?php echo $a = $den->__GET('idMoneda') ?>");
                $("#valor").val("<?php echo $den->__GET('valor') ?>");         
                $("#valorLetras").val("<?php echo $den->__GET('valor_letras') ?>");   
                recargarLista();
            }
        </script>

        <script>
            $(document).ready(function(){
                
                setValores();

                $('#moneda').change(function(){
                    recargarLista();
                })

            })
        </script>

        <script>
            function recargarLista(){
                $.ajax({
                    type:"POST",
                    url:"../datos/Dt_DenoSimbolo.php",
                    data:"moneda=" + $('#moneda').val(),
                    success:function(r){
                        $('#simbol').html(r);
                    }
                })
            }
        </script>


    </body>
</html>
