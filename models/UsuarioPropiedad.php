<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_propiedad".
 *
 * @property int $id
 * @property int $usuario_id
 * @property int $propiedad_id
 *
 * @property Propiedad $propiedad
 * @property Usuario $usuario
 */
class UsuarioPropiedad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario_propiedad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'propiedad_id'], 'required'],
            [['usuario_id', 'propiedad_id'], 'integer'],
            [['propiedad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Propiedad::className(), 'targetAttribute' => ['propiedad_id' => 'id']],
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
            'usuario_id' => 'Usuario ID',
            'propiedad_id' => 'Propiedad ID',
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
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id']);
    }
}
