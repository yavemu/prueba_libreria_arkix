<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Autores;

/**
 * AutoresSearch represents the model behind the search form of `app\models\Autores`.
 */
class AutoresSearch extends Autores
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_autor', 'anio_nacimiento', 'anio_fallecido'], 'integer'],
            [['nombre', 'apellidos'], 'safe'],
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
        $query = Autores::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['apellidos'=>SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_autor' => $this->id_autor,
            'anio_nacimiento' => $this->anio_nacimiento,
            'anio_fallecido' => $this->anio_fallecido,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos]);

        return $dataProvider;
    }
}
