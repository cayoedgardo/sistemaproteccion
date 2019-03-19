<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Objetorobado;

/**
 * ObjetorobadoSearch represents the model behind the search form of `app\models\Objetorobado`.
 */
class ObjetorobadoSearch extends Objetorobado
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['salida_id', 'objeto_id', 'id'], 'integer'],
            [['fecha'], 'safe'],
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
    public function search($params)
    {
        $query = Objetorobado::find();

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
            'salida_id' => $this->salida_id,
            'objeto_id' => $this->objeto_id,
            'id' => $this->id,
            'fecha' => $this->fecha,
        ]);

        return $dataProvider;
    }
}
