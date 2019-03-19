<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salida".
 *
 * @property int $id
 * @property string $tipo
 * @property string $descripcion
 * @property int $estado
 * @property int $propiedad_id
 * @property int $sensor_id
 *
 * @property Propiedad $propiedad
 * @property Sensor $sensor
 */
class Salida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado', 'propiedad_id', 'sensor_id'], 'integer'],
            [['propiedad_id', 'sensor_id'], 'required'],
            [['tipo'], 'string', 'max' => 60],
            [['descripcion'], 'string', 'max' => 500],
            [['propiedad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Propiedad::className(), 'targetAttribute' => ['propiedad_id' => 'id']],
            [['sensor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sensor::className(), 'targetAttribute' => ['sensor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
            'propiedad_id' => 'Propiedad ID',
            'sensor_id' => 'Sensor ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropiedad()
    {
        return $this->hasOne(Propiedad::className(), ['id' => 'propiedad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSensor()
    {
        return $this->hasOne(Sensor::className(), ['id' => 'sensor_id']);
    }
}
