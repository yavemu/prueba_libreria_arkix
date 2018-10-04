<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $id_cliente
 * @property string $nombre
 * @property string $apellidos
 * @property int $telefono
 * @property string $direccion_envio
 *
 * @property Ventas[] $ventas
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellidos', 'telefono', 'direccion_envio'], 'required'],
            [['telefono'], 'integer'],
            [['nombre', 'apellidos'], 'string', 'max' => 50],
            [['direccion_envio'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Id Cliente',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'telefono' => 'Telefono',
            'direccion_envio' => 'Direccion Envio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::className(), ['cliente_id' => 'id_cliente']);
    }
}
