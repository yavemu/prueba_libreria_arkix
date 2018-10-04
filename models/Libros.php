<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros".
 *
 * @property int $id_libro
 * @property string $titulo
 * @property string $editor
 * @property string $fecha_publicacion
 * @property string $edicion
 * @property double $costo
 * @property double $precio_sugerido
 * @property string $valoracion
 * @property string $descripcion_valoracion
 * @property string $estado
 *
 * @property LibroAutor[] $libroAutors
 * @property Ventas[] $ventas
 */
class Libros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'editor', 'fecha_publicacion', 'edicion', 'costo', 'precio_sugerido', 'valoracion'], 'required'],
            [['fecha_publicacion'], 'safe'],
            [['costo', 'precio_sugerido'], 'number'],
            [['valoracion', 'estado'], 'string'],
            [['titulo', 'editor', 'edicion'], 'string', 'max' => 50],
            [['descripcion_valoracion'], 'string', 'max' => 200],
            [['fecha_publicacion'],'validateDates'],
            [['costo','precio_sugerido'],'validatePrice'],
        ];
    }

    public function validateDates(){

            if(strtotime($this->fecha_publicacion) > strtotime(date('Y-m-d')))
            {
                $this->addError('fecha_publicacion','No puede ser superior a la fecha actual.');
            }
    }
    
    public function validatePrice(){

            if($this->costo >= $this->precio_sugerido)
            {
                $this->addError('precio_sugerido','No puede ser inferior a '.$this->costo.'.');
            }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_libro' => 'Id Libro',
            'titulo' => 'Titulo',
            'editor' => 'Editor',
            'fecha_publicacion' => 'Fecha Publicacion',
            'edicion' => 'Edicion',
            'costo' => 'Costo',
            'precio_sugerido' => 'Precio Sugerido',
            'valoracion' => 'Valoracion',
            'descripcion_valoracion' => 'Descripcion Valoracion',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibroAutors()
    {
        return $this->hasMany(LibroAutor::className(), ['libro_id' => 'id_libro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::className(), ['libro_id' => 'id_libro']);
    }
}
