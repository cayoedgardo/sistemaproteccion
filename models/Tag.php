<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property int $id
 * @property string $etiqueta
 * @property int $estado
 * @property int $estado_uso
 *
 * @property Objeto[] $objetos
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['etiqueta', 'estado'], 'required'],
            [['estado', 'estado_uso'], 'integer'],
            [['etiqueta'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'etiqueta' => 'Etiqueta',
            'estado' => 'Estado',
            'estado_uso' => 'Estado Uso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjetos()
    {
        return $this->hasMany(Objeto::className(), ['tag_id' => 'id']);
    }
}
