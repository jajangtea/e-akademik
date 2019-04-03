<?php

namespace app\models\akademik;

use Yii;

/**
 * This is the model class for table "{{%perusahaan}}".
 *
 * @property int $idPerusahaan
 * @property string $namaPerusahaan
 * @property string $alamat
 * @property string $tlp
 *
 * @property Surat[] $surats
 */
class Perusahaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%perusahaan}}';
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
            [['namaPerusahaan', 'alamat', 'tlp'], 'required'],
            [['alamat'], 'string'],
            [['namaPerusahaan'], 'string', 'max' => 200],
            [['tlp'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPerusahaan' => 'Id Perusahaan',
            'namaPerusahaan' => 'Nama Perusahaan',
            'alamat' => 'Alamat',
            'tlp' => 'Tlp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurats()
    {
        return $this->hasMany(Surat::className(), ['tujuan' => 'idPerusahaan']);
    }
}
