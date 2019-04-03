<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "agama".
 *
 * @property int $idagama
 * @property string $nama_agama
 */
class Agama extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agama';
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
            [['idagama', 'nama_agama'], 'required'],
            [['idagama'], 'integer'],
            [['nama_agama'], 'string', 'max' => 30],
            [['idagama'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idagama' => 'Idagama',
            'nama_agama' => 'Nama Agama',
        ];
    }
}
