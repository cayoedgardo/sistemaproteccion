<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_objeto".
 *
 * @property int $id
 * @property int $usuario_id
 * @property int $objeto_id
 *
 * @property Objeto $objeto
 * @property Usuario $usuario
 */
class UsuarioObjeto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario_objeto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'objeto_id'], 'required'],
            [['usuario_id', 'objeto_id'], 'integer'],
            [['objeto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Objeto::className(), 'targetAttribute' => ['objeto_id' => 'id']],
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
            'objeto_id' => 'Objeto ID',
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
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'usuario_id']);
    }
}
