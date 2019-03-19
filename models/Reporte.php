<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reporte".
 *
 * @property int $id
 * @property string $fecha
 * @property int $usuario_id
 *
 * @property Usuario $usuario
 * @property Reporteobjeto[] $reporteobjetos
 */
class Reporte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reporte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['usuario_id'], 'integer'],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'usuario_id' => 'Usuario ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReporteobjetos()
    {
        return $this->hasMany(Reporteobjeto::className(), ['reporte_id' => 'id']);
    }
}
