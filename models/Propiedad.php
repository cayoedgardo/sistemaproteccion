<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "propiedad".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $direccion
 * @property string $ubicacion
 * @property int $cant_persona
 * @property int $estado
 *
 * @property Objeto[] $objetos
 * @property Salida[] $salidas
 * @property UsuarioPropiedad[] $usuarioPropiedads
 */
class Propiedad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'propiedad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'direccion', 'ubicacion', 'estado'], 'required'],
            [['cant_persona', 'estado'], 'integer'],
            [['nombre'], 'string', 'max' => 60],
            [['descripcion'], 'string', 'max' => 500],
            [['direccion', 'ubicacion'], 'string', 'max' => 100],
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
            'direccion' => 'Direccion',
            'ubicacion' => 'Ubicacion',
            'cant_persona' => 'Cant Persona',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjetos()
    {
        return $this->hasMany(Objeto::className(), ['propiedad_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalidas()
    {
        return $this->hasMany(Salida::className(), ['propiedad_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioPropiedads()
    {
        return $this->hasMany(UsuarioPropiedad::className(), ['propiedad_id' => 'id']);
    }
}
