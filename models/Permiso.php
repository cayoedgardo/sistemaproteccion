<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permiso".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $accionpermiso
 * @property int $estado
 *
 * @property RolPermiso[] $rolPermisos
 * @property UsuarioPermiso[] $usuarioPermisos
 */
class Permiso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'permiso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'accionpermiso', 'estado'], 'required'],
            [['estado'], 'integer'],
            [['nombre', 'accionpermiso'], 'string', 'max' => 60],
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
            'accionpermiso' => 'Accionpermiso',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolPermisos()
    {
        return $this->hasMany(RolPermiso::className(), ['permiso_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioPermisos()
    {
        return $this->hasMany(UsuarioPermiso::className(), ['permiso_id' => 'id']);
    }
}
