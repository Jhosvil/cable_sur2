<div class="container">
    <div class="row">
        <h3>Bienvenido a la vista de estadisticas de Cable Sur Digital S.R.L</h3>
    </div>
    <div class="row">
        <div class="col-lg-3 col-6">            
            <div class="small-box bg-warning">
                <div class="inner">
                    <div id="totalClientetot">
                        <!-- Aqui se cargaran los datos de manera asincronicamente -->
                    </div>
                    <p>Total de Clientes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col (LEFT) -->
            <div class="col-md-4">
                <!-- LINE CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Grafico de Barras</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="chart">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                        <canvas id="lienzo"></canvas>
                                    </div>
                                </div>
                            </div>
                            <form action="">
                                <div class="row">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script src="js/estadistica.js"></script>

