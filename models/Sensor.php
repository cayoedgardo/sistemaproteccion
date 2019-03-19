<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sensor".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $modelo
 * @property int $estado
 * @property int $utilizado
 * @property string $fecha_modificacion
 *
 * @property Salida[] $salidas
 */
class Sensor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sensor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['estado', 'utilizado'], 'integer'],
            [['fecha_modificacion'], 'safe'],
            [['nombre', 'modelo'], 'string', 'max' => 60],
            [['descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'modelo' => 'Modelo',
            'estado' => 'Estado',
            'utilizado' => 'Utilizado',
            'fecha_modificacion' => 'Fecha Modificacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salida::className(), ['sensor_id' => 'id']);
    }
}
