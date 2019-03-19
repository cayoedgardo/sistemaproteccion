<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;
use app\models\Objeto;
use app\models\Propiedad;
use app\models\Salida;
use app\models\Objetorobado;
use kartik\mpdf\Pdf;
use yii\helpers\Url;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ObjetorobadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Objetos Robados';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="objetorobado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  function moneda_chilena($numero){
        $numero = (string)$numero;
        $puntos = floor((strlen($numero)-1)/3);
        $tmp = "";
        $pos = 1;
        for($i=strlen($numero)-1; $i>=0; $i--){
        $tmp = $tmp.substr($numero, $i, 1);
        if($pos%3==0 && $pos!=strlen($numero))
        $tmp = $tmp.".";
        $pos = $pos + 1;
        }
        $formateado = "$ ".strrev($tmp);
        return $formateado;
        }
    ?>
    <div class="box">
        <div class="box-body">
            <table  class="table table-bordered table-striped">
                <thead >
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Serie</th>
                    <th scope="col">Salida</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Precio</th>
                    </tr>
                </thead>
                
                <?php 
                    for($j=0;$j<$i;$j++){ ?>
                        <tr>
                        <th scope="row"><?php echo $j+1; ?></th>
                        <td><?php echo $objetoRobado[$j]->nombre; ?></td>
                        <td><?php echo $objetoRobado[$j]->marca; ?></td>
                        <td><?php echo $objetoRobado[$j]->tipo; ?></td>
                        <td><?php echo $objetoRobado[$j]->modelo; ?></td>
                        <td><?php echo $objetoRobado[$j]->serie; ?></td>
                        
                        <td><?php 
                            $modelObjetoRobado = ObjetoRobado::find()->where(['objeto_id' => $objetoRobado[$j]->id])->one();

                            $salida = Salida::find()->where(['id' => $modelObjetoRobado->salida_id])->one();
                        
                        echo $salida->tipo; ?></td>
                        <td> 
                        <?php 
                            $objetoFecha = Objetorobado::find()->where(['objeto_id' => $objetoRobado[$j]->id])->one();
                            echo $objetoFecha->fecha;
                        ?>
                         </td>
                        <td><?php echo moneda_chilena($objetoRobado[$j]->precio); ?></td>
                        <tr>
                <?php } ?>
                        <tr> 
                        <td>   </td>
                        <td>     </td>
                        <td>     </td>
                        <td>     </td>
                        <td>     </td>
                        
                        <td>     </td>
                        <td>  <th> TOTAL </th>   </td>
                        <th><?php echo moneda_chilena($total); ?></th> 

                        </tr>
            </table>
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            <table  class="table table-bordered table-striped">
                <thead >
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">dirección</th>
                    <th scope="col">Ubicación</th>
                    
                    </tr>
                </thead>
                
                <?php $k=0;
                    for($k=0;$k<$p;$k++){ 
                        if($grouppropiedad != null){?>
                        <tr>
                        <th scope="row"><?php echo $k+1; ?></th>
                        <td><?php echo $grouppropiedad[$k]->nombre; ?></td>
                        <td><?php echo $grouppropiedad[$k]->descripcion; ?></td>
                        <td><?php echo $grouppropiedad[$k]->direccion; ?></td>
                        <td><?php echo $grouppropiedad[$k]->ubicacion; ?></td>
                        </tr>
                <?php }} ?>
                        
            </table>
        </div>
    </div>
    

</div>