<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autores".
 *
 * @property int $id_autor
 * @property string $nombre
 * @property string $apellidos
 * @property string $anio_nacimiento
 * @property string $anio_fallecido
 *
 * @property LibroAutor[] $libroAutors
 */
class Autores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apellidos'], 'required'],
            [['anio_nacimiento', 'anio_fallecido'], 'safe'],
            [['nombre', 'apellidos'], 'string', 'max' => 100],
            [['anio_nacimiento', 'anio_fallecido'],'validateDates'],
        ];
    }

    public function validateDates(){

        if (!empty($this->anio_nacimiento) and !empty($this->anio_fallecido)) 
        {
            if(strtotime($this->anio_nacimiento) >= strtotime($this->anio_fallecido))
            {
                $this->addError('anio_fallecido','No puede ser superior a la fecha de nacimiento.');
            }
        }

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_autor' => 'Id Autor',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'anio_nacimiento' => 'Año Nacimiento',
            'anio_fallecido' => 'Año Fallecido',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibroAutors()
    {
        return $this->hasMany(LibroAutor::className(), ['autor_id' => 'id_autor']);
    }
}
