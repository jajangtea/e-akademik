<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "pin".
 *
 * @property string $no_pin
 * @property int $no_formulir
 * @property string $tahun_masuk
 * @property int $semester_masuk
 * @property string $idkelas
 *
 * @property PesertaUjianPmb $pesertaUjianPmb
 */
class Pin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pin';
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
            [['no_pin', 'no_formulir', 'tahun_masuk', 'semester_masuk', 'idkelas'], 'required'],
            [['no_formulir', 'semester_masuk'], 'integer'],
            [['tahun_masuk'], 'safe'],
            [['no_pin'], 'string', 'max' => 100],
            [['idkelas'], 'string', 'max' => 1],
            [['no_pin'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_pin' => 'No Pin',
            'no_formulir' => 'No Formulir',
            'tahun_masuk' => 'Tahun Masuk',
            'semester_masuk' => 'Semester Masuk',
            'idkelas' => 'Idkelas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesertaUjianPmb()
    {
        return $this->hasOne(PesertaUjianPmb::className(), ['no_formulir' => 'no_formulir']);
    }
}
