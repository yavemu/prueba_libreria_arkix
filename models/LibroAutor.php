<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libro_autor".
 *
 * @property int $id_lib_aut
 * @property int $libro_id
 * @property int $autor_id
 *
 * @property Autores $autor
 * @property Libros $libro
 */
class LibroAutor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libro_autor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['libro_id', 'autor_id'], 'integer'],
            [['libro_id', 'autor_id'], 'required'],
            [['autor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Autores::className(), 'targetAttribute' => ['autor_id' => 'id_autor']],
            [['libro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Libros::className(), 'targetAttribute' => ['libro_id' => 'id_libro']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_lib_aut' => 'Id Lib Aut',
            'libro_id' => 'Libro',
            'autor_id' => 'Autor(es)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutor()
    {
        return $this->hasOne(Autores::className(), ['id_autor' => 'autor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibro()
    {
        return $this->hasOne(Libros::className(), ['id_libro' => 'libro_id']);
    }
}
