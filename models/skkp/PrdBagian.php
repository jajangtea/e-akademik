<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_bagian".
 *
 * @property int $idBagian
 * @property string $namaBagian
 */
class PrdBagian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_bagian';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_skkp');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idBagian'], 'required'],
            [['idBagian'], 'integer'],
            [['namaBagian'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idBagian' => 'Id Bagian',
            'namaBagian' => 'Nama Bagian',
        ];
    }
}
