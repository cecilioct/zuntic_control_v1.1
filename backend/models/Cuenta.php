<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cuenta".
 *
 * @property int $id
 * @property string $concepto
 * @property float $monto
 * @property int $id_huesped
 * @property string $creado_el
 * @property string $actualizado_el
 * @property int $creado_por
 * @property int $actualizado_por
 *
 * @property Huesped $huesped
 */
class Cuenta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cuenta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['concepto', 'monto', 'id_huesped', 'creado_el', 'actualizado_el', 'creado_por', 'actualizado_por'], 'required'],
            [['monto'], 'number'],
            [['id_huesped', 'creado_por', 'actualizado_por'], 'integer'],
            [['creado_el', 'actualizado_el'], 'safe'],
            [['concepto'], 'string', 'max' => 255],
            [['id_huesped'], 'exist', 'skipOnError' => true, 'targetClass' => Huesped::className(), 'targetAttribute' => ['id_huesped' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'concepto' => 'Concepto',
            'monto' => 'Monto',
            'id_huesped' => 'Id Huesped',
            'creado_el' => 'Creado El',
            'actualizado_el' => 'Actualizado El',
            'creado_por' => 'Creado Por',
            'actualizado_por' => 'Actualizado Por',
        ];
    }

    /**
     * Gets query for [[Huesped]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHuesped()
    {
        return $this->hasOne(Huesped::className(), ['id' => 'id_huesped']);
    }
}
