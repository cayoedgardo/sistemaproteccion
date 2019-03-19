<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "objeto".
 *
 * @property int $id
 * @property string $nombre
 * @property string $marca
 * @property string $tipo
 * @property int $precio
 * @property string $modelo
 * @property int $estado
 * @property string $serie
 * @property string $ultima_actualizacion
 * @property int $tag_id
 * @property int $propiedad_id
 *
 * @property Propiedad $propiedad
 * @property Tag $tag
 * @property UsuarioObjeto[] $usuarioObjetos
 */
class Objeto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'objeto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'marca', 'estado', 'ultima_actualizacion', 'tag_id', 'propiedad_id'], 'required'],
            [['precio', 'estado', 'tag_id', 'propiedad_id'], 'integer'],
            [['ultima_actualizacion'], 'safe'],
            [['nombre', 'tipo', 'modelo'], 'string', 'max' => 60],
            [['marca', 'serie'], 'string', 'max' => 70],
            [['propiedad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Propiedad::className(), 'targetAttribute' => ['propiedad_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag_id' => 'id']],
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
            'marca' => 'Marca',
            'tipo' => 'Tipo',
            'precio' => 'Precio',
            'modelo' => 'Modelo',
            'estado' => 'Estado',
            'serie' => 'Serie',
            'ultima_actualizacion' => 'Ultima Actualizacion',
            'tag_id' => 'Tag ID',
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
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioObjetos()
    {
        return $this->hasMany(UsuarioObjeto::className(), ['objeto_id' => 'id']);
    }
}
