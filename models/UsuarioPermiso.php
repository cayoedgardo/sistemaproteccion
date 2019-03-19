<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_permiso".
 *
 * @property int $id
 * @property int $usuario_id
 * @property int $permiso_id
 *
 * @property Permiso $permiso
 * @property Usuario $usuario
 */
class UsuarioPermiso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario_permiso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'permiso_id'], 'required'],
            [['usuario_id', 'permiso_id'], 'integer'],
            [['permiso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Permiso::className(), 'targetAttribute' => ['permiso_id' => 'id']],
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
            'permiso_id' => 'Permiso ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermiso()
    {
        return $this->hasOne(Permiso::className(), ['id' => 'permiso_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id']);
    }
}
