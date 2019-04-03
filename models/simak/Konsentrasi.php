<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "konsentrasi".
 *
 * @property int $idkonsentrasi
 * @property int $kjur
 * @property string $nama_konsentrasi
 */
class Konsentrasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'konsentrasi';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_simak');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idkonsentrasi', 'kjur', 'nama_konsentrasi'], 'required'],
            [['idkonsentrasi', 'kjur'], 'integer'],
            [['nama_konsentrasi'], 'string', 'max' => 40],
            [['idkonsentrasi'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkonsentrasi' => 'Idkonsentrasi',
            'kjur' => 'Kjur',
            'nama_konsentrasi' => 'Nama Konsentrasi',
        ];
    }
}
