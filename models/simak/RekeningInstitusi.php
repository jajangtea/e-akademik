<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "rekening_institusi".
 *
 * @property int $idrekening_institusi
 * @property string $no_rekening
 * @property string $bank
 * @property string $idkelas
 */
class RekeningInstitusi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rekening_institusi';
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
            [['no_rekening', 'bank', 'idkelas'], 'required'],
            [['no_rekening', 'bank'], 'string', 'max' => 30],
            [['idkelas'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idrekening_institusi' => 'Idrekening Institusi',
            'no_rekening' => 'No Rekening',
            'bank' => 'Bank',
            'idkelas' => 'Idkelas',
        ];
    }
}
