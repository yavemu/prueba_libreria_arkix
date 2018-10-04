<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Libros;

/**
 * LibrosSearch represents the model behind the search form of `app\models\Libros`.
 */
class LibrosSearch extends Libros
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_libro'], 'integer'],
            [['titulo', 'editor', 'fecha_publicacion', 'edicion', 'valoracion', 'descripcion_valoracion', 'estado'], 'safe'],
            [['costo', 'precio_sugerido'], 'number'],
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
        $query = Libros::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['titulo'=>SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_libro' => $this->id_libro,
            'fecha_publicacion' => $this->fecha_publicacion,
            'costo' => $this->costo,
            'precio_sugerido' => $this->precio_sugerido,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'editor', $this->editor])
            ->andFilterWhere(['like', 'edicion', $this->edicion])
            ->andFilterWhere(['like', 'valoracion', $this->valoracion])
            ->andFilterWhere(['like', 'descripcion_valoracion', $this->descripcion_valoracion])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
