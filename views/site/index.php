
<?php

/* @var $this yii\web\View */

$this->title = 'Sistema de Protección y Detección';
?>
<div class="body-content">
    <div class="row">
      <div class="col-md-6">
        <img src="../web/img/sb-uta-portada.png">
      </div>
    </div>
</div>
<br>
<div class="site-index">

    

    <div class="body-content">

        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $objetoCount; ?></h3>

              <p>Objetos Protegidos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="http://localhost/sistemaproteccion/web/index.php?r=objeto%2Findex" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $objetoCountRobado; ?><sup style="font-size: 20px"></sup></h3>

              <p>Objetos en Alerta</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="http://localhost/sistemaproteccion/web/index.php?r=objeto%2Findex" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $propiedadCountActiva; ?></h3>

              <p>Propiedades Activas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="http://localhost/sistemaproteccion/web/index.php?r=propiedad%2Findex" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $propiedadCountInactiva; ?></h3>

              <p>Propiedades Inactivas</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="http://localhost/sistemaproteccion/web/index.php?r=propiedad%2Findex" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

    </div>
</div>
