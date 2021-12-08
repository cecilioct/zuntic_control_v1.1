<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior; 
use yii\behaviors\BlameableBehavior; 
use yii\db\Expression;
use common\models\User;

/**
 * This is the model class for table "huesped".
 *
 * @property int $id
 * @property string $nombre
 * @property string $telefono
 * @property string $correo
 * @property int $id_habitacion
 * @property int $id_estancia
 * @property string $creado_el
 * @property string $actualizado_el
 * @property int $creado_por
 * @property int $actualizado_por
 *
 * @property Cuenta[] $cuentas
 * @property Estancia $estancia
 * @property Habitacion $habitacion
 */
class Huesped extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'huesped';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'telefono', 'correo', 'id_habitacion', 'id_estancia'], 'required'],
            [['id_habitacion', 'id_estancia', 'creado_por', 'actualizado_por'], 'integer'],
            [['creado_el', 'actualizado_el'], 'safe'],
            [['nombre', 'correo'], 'string', 'max' => 255],
            [['telefono'], 'string', 'max' => 15],
            [['id_estancia'], 'exist', 'skipOnError' => true, 'targetClass' => Estancia::className(), 'targetAttribute' => ['id_estancia' => 'id']],
            [['id_habitacion'], 'exist', 'skipOnError' => true, 'targetClass' => Habitacion::className(), 'targetAttribute' => ['id_habitacion' => 'id']],
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'creado_el',
                'updatedAtAttribute' => 'actualizado_el',
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'creado_por',
                'updatedByAttribute' => 'actualizado_por',
            ],
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
            'telefono' => 'Telefono',
            'correo' => 'Correo',
            'id_habitacion' => 'Id Habitacion',
            'id_estancia' => 'Id Estancia',
            'creado_el' => 'Creado El',
            'actualizado_el' => 'Actualizado El',
            'creado_por' => 'Creado Por',
            'actualizado_por' => 'Actualizado Por',
        ];
    }

    /**
     * Gets query for [[Cuentas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCuentas()
    {
        return $this->hasMany(Cuenta::className(), ['id_huesped' => 'id']);
    }

    /**
     * Gets query for [[Estancia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstancia()
    {
        return $this->hasOne(Estancia::className(), ['id' => 'id_estancia']);
    }

    /**
     * Gets query for [[Habitacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHabitacion()
    {
        return $this->hasOne(Habitacion::className(), ['id' => 'id_habitacion']);
    }

    public function getUserName($id) 
    { 
        $user = User::findIdentity($id);

        return $user->username; 
    }
    
}
