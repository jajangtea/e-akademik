<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "kelas".
 *
 * @property string $idkelas
 * @property string $nkelas
 */
class Kelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas';
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
            [['idkelas', 'nkelas'], 'required'],
            [['idkelas'], 'string', 'max' => 1],
            [['nkelas'], 'string', 'max' => 15],
            [['idkelas'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idkelas' => 'Idkelas',
            'nkelas' => 'Nkelas',
        ];
    }
}
