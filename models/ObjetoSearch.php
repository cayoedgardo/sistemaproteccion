<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Objeto;

/**
 * ObjetoSearch represents the model behind the search form of `app\models\Objeto`.
 */
class ObjetoSearch extends Objeto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'precio', 'estado', 'tag_id', 'propiedad_id'], 'integer'],
            [['nombre', 'marca', 'tipo', 'modelo', 'serie', 'ultima_actualizacion'], 'safe'],
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
        $query = Objeto::find();

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
            'precio' => $this->precio,
            'estado' => $this->estado,
            'ultima_actualizacion' => $this->ultima_actualizacion,
            'tag_id' => $this->tag_id,
            'propiedad_id' => $this->propiedad_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'serie', $this->serie]);

        return $dataProvider;
    }
}
