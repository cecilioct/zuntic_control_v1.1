<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "estado".
 *
 * @property int $id
 * @property int $id_limpieza
 * @property int $id_ocupacion
 * @property string $creado_el
 * @property string $actualizado_el
 * @property int $creado_por
 * @property int $actualizado_por
 *
 * @property Habitacion[] $habitacions
 * @property Limpieza $limpieza
 * @property Ocupacion $ocupacion
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_limpieza', 'id_ocupacion', 'creado_el', 'actualizado_el', 'creado_por', 'actualizado_por'], 'required'],
            [['id_limpieza', 'id_ocupacion', 'creado_por', 'actualizado_por'], 'integer'],
            [['creado_el', 'actualizado_el'], 'safe'],
            [['id_limpieza'], 'exist', 'skipOnError' => true, 'targetClass' => Limpieza::className(), 'targetAttribute' => ['id_limpieza' => 'id']],
            [['id_ocupacion'], 'exist', 'skipOnError' => true, 'targetClass' => Ocupacion::className(), 'targetAttribute' => ['id_ocupacion' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_limpieza' => 'Id Limpieza',
            'id_ocupacion' => 'Id Ocupacion',
            'creado_el' => 'Creado El',
            'actualizado_el' => 'Actualizado El',
            'creado_por' => 'Creado Por',
            'actualizado_por' => 'Actualizado Por',
        ];
    }

    /**
     * Gets query for [[Habitacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHabitacions()
    {
        return $this->hasMany(Habitacion::className(), ['id_estado' => 'id']);
    }

    /**
     * Gets query for [[Limpieza]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLimpieza()
    {
        return $this->hasOne(Limpieza::className(), ['id' => 'id_limpieza']);
    }

    /**
     * Gets query for [[Ocupacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOcupacion()
    {
        return $this->hasOne(Ocupacion::className(), ['id' => 'id_ocupacion']);
    }
}
