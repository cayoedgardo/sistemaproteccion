<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $mail
 * @property string $password
 *
 * @property UsuarioObjeto[] $usuarioObjetos
 * @property UsuarioPermiso[] $usuarioPermisos
 * @property UsuarioPropiedad[] $usuarioPropiedads
 * @property UsuarioRol[] $usuarioRols
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'mail', 'password'], 'required'],
            [['nombre', 'apellido'], 'string', 'max' => 60],
            [['mail', 'password'], 'string', 'max' => 100],
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
            'apellido' => 'Apellido',
            'mail' => 'Mail',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioObjetos()
    {
        return $this->hasMany(UsuarioObjeto::className(), ['usuario_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioPermisos()
    {
        return $this->hasMany(UsuarioPermiso::className(), ['usuario_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioPropiedads()
    {
        return $this->hasMany(UsuarioPropiedad::className(), ['usuario_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioRols()
    {
        return $this->hasMany(UsuarioRol::className(), ['usuario_id' => 'id']);
    }
}
