<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reporteobjeto".
 *
 * @property int $reporte_id
 * @property int $objeto_id
 * @property int $id
 *
 * @property Objeto $objeto
 * @property Reporte $reporte
 */
class Reporteobjeto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reporteobjeto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reporte_id', 'objeto_id'], 'required'],
            [['reporte_id', 'objeto_id'], 'integer'],
            [['objeto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Objeto::className(), 'targetAttribute' => ['objeto_id' => 'id']],
            [['reporte_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reporte::className(), 'targetAttribute' => ['reporte_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'reporte_id' => 'Reporte ID',
            'objeto_id' => 'Objeto ID',
            'id' => 'ID',
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
    public function getReporte()
    {
        return $this->hasOne(Reporte::className(), ['id' => 'reporte_id']);
    }
}
