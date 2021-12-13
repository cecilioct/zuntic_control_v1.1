<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Habitacion;

/**
 * HabitacionSearch represents the model behind the search form of `backend\models\Habitacion`.
 */
class HabitacionSearch extends Habitacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_tipo_habitacion', 'id_estado'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $id_tipo_habitacion  = null)
    {
        if ($id_tipo_habitacion)
         $query = Habitacion::find()->where(['id_tipo_habitacion' => $id_tipo_habitacion ]);
        else
         $query = Habitacion::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_tipo_habitacion' => $this->id_tipo_habitacion,
            'id_estado' => $this->id_estado,
        ]);

        return $dataProvider;
    }
}
