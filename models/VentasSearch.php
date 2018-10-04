<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ventas;

/**
 * VentasSearch represents the model behind the search form of `app\models\Ventas`.
 */
class VentasSearch extends Ventas
{
    public $libro_titulo;
    public $cliente_nombre;
    public $cliente_apellidos;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_venta', 'libro_id', 'cliente_id'], 'integer'],
            [['fecha_venta', 'vendedor', 'cliente_nombre','libro_titulo','cliente_apellidos'], 'safe'],
            [['valor'], 'number'],
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
        $query = Ventas::find();
        $query->joinWith(['libro','cliente']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['fecha_venta'=>SORT_DESC]]
        ]);

        $dataProvider->sort->attributes['libro_titulo'] = [
            'asc' => ['libros.titulo' => SORT_ASC],
            'desc' => ['libros.titulo' => SORT_DESC],
        ];
        
        $dataProvider->sort->attributes['cliente_nombre'] = [
            'asc' => ['clientes.nombre' => SORT_ASC],
            'desc' => ['clientes.nombre' => SORT_DESC],
        ];
        
        $dataProvider->sort->attributes['cliente_apellidos'] = [
            'asc' => ['clientes.apellidos' => SORT_ASC],
            'desc' => ['clientes.apellidos' => SORT_DESC],
        ];
     

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_venta' => $this->id_venta,
            'libro_id' => $this->libro_id,
            'cliente_id' => $this->cliente_id,
            'fecha_venta' => $this->fecha_venta,
            'valor' => $this->valor,
            // 'libro_titulo' => $this->libro_titulo,
            // 'cliente_nombre' => $this->cliente_nombre,
            // 'cliente_apellidos' => $this->cliente_apellidos,
        ]);

        $query->andFilterWhere(['like', 'vendedor', $this->vendedor])
        ->andFilterWhere(['like', 'clientes.nombre', $this->cliente_nombre])
        ->andFilterWhere(['like', 'clientes.apellidos', $this->cliente_apellidos])
        ->andFilterWhere(['like', 'libros.titulo', $this->libro_titulo]);

        return $dataProvider;
    }
}
