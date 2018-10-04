<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ventas".
 *
 * @property int $id_venta
 * @property int $libro_id
 * @property int $cliente_id
 * @property string $fecha_venta
 * @property double $valor
 * @property string $vendedor
 *
 * @property Clientes $cliente
 * @property Libros $libro
 */
class Ventas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ventas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['libro_id', 'cliente_id', 'fecha_venta', 'valor', 'vendedor'], 'required'],
            [['libro_id', 'cliente_id'], 'integer'],
            [['fecha_venta'], 'safe'],
            [['valor'], 'number'],
            [['vendedor'], 'string', 'max' => 50],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['cliente_id' => 'id_cliente']],
            [['libro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Libros::className(), 'targetAttribute' => ['libro_id' => 'id_libro']],
            [['fecha_venta'],'validateDates'],
        ];
    }

    public function validateDates(){

        if(strtotime($this->fecha_venta) > strtotime(date('Y-m-d')))
        {
            $this->addError('fecha_venta','No puede ser superior a la fecha actual.');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_venta' => 'Id Venta',
            'libro_id' => 'Libro',
            'cliente_id' => 'Cliente',
            'fecha_venta' => 'Fecha Venta',
            'valor' => 'Valor',
            'vendedor' => 'Vendedor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::className(), ['id_cliente' => 'cliente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibro()
    {
        return $this->hasOne(Libros::className(), ['id_libro' => 'libro_id']);
    }
}
