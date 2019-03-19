<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rol_permiso".
 *
 * @property int $id
 * @property int $rol_id
 * @property int $permiso_id
 *
 * @property Permiso $permiso
 * @property Rol $rol
 */
class RolPermiso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rol_permiso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rol_id', 'permiso_id'], 'required'],
            [['rol_id', 'permiso_id'], 'integer'],
            [['permiso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Permiso::className(), 'targetAttribute' => ['permiso_id' => 'id']],
            [['rol_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['rol_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rol_id' => 'Rol ID',
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
    public function getRol()
    {
        return $this->hasOne(Rol::className(), ['id' => 'rol_id']);
    }
}
