<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "objetorobado".
 *
 * @property int $salida_id
 * @property int $objeto_id
 * @property int $id
 * @property string $fecha
 *
 * @property Objeto $objeto
 * @property Salida $salida
 */
class Objetorobado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'objetorobado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['salida_id', 'objeto_id'], 'required'],
            [['salida_id', 'objeto_id'], 'integer'],
            [['fecha'], 'safe'],
            [['objeto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Objeto::className(), 'targetAttribute' => ['objeto_id' => 'id']],
            [['salida_id'], 'exist', 'skipOnError' => true, 'targetClass' => Salida::className(), 'targetAttribute' => ['salida_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'salida_id' => 'Salida ID',
            'objeto_id' => 'Objeto ID',
            'id' => 'ID',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjeto()
    {
        return $this->hasOne(Objeto::className(), ['id' => 'objeto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalida()
    {
        return $this->hasOne(Salida::className(), ['id' => 'salida_id']);
    }
}
