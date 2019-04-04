<?php

namespace app\models\akademik;

use Yii;

/**
 * This is the model class for table "{{%jenis_surat}}".
 *
 * @property int $idJenis
 * @property string $kodeJenis
 * @property string $jenisSurat
 *
 * @property Surat[] $surats
 */
class JenisSurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%jenis_surat}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_akademik');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kodeJenis', 'jenisSurat'], 'required'],
            [['kodeJenis'], 'string', 'max' => 10],
            [['jenisSurat'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idJenis' => 'Id Jenis',
            'kodeJenis' => 'Kode Jenis',
            'jenisSurat' => 'Jenis Surat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurats()
    {
        return $this->hasMany(Surat::className(), ['idJenis' => 'idJenis']);
    }
}
