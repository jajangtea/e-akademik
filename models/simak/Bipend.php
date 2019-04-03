<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "bipend".
 *
 * @property string $idbipend
 * @property string $tahun
 * @property string $no_faktur
 * @property string $tgl_bayar
 * @property int $no_formulir
 * @property int $gelombang
 * @property int $dibayarkan
 * @property string $ket
 * @property int $userid
 *
 * @property FormulirPendaftaran $noFormulir
 */
class Bipend extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bipend';
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
            [['tahun', 'no_faktur', 'tgl_bayar', 'no_formulir', 'gelombang', 'dibayarkan', 'ket', 'userid'], 'required'],
            [['tahun', 'tgl_bayar'], 'safe'],
            [['no_formulir', 'gelombang', 'dibayarkan', 'userid'], 'integer'],
            [['no_faktur'], 'string', 'max' => 15],
            [['ket'], 'string', 'max' => 255],
            [['no_formulir'], 'unique'],
            [['no_faktur'], 'unique'],
            [['no_formulir'], 'exist', 'skipOnError' => true, 'targetClass' => FormulirPendaftaran::className(), 'targetAttribute' => ['no_formulir' => 'no_formulir']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idbipend' => 'Idbipend',
            'tahun' => 'Tahun',
            'no_faktur' => 'No Faktur',
            'tgl_bayar' => 'Tgl Bayar',
            'no_formulir' => 'No Formulir',
            'gelombang' => 'Gelombang',
            'dibayarkan' => 'Dibayarkan',
            'ket' => 'Ket',
            'userid' => 'Userid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoFormulir()
    {
        return $this->hasOne(FormulirPendaftaran::className(), ['no_formulir' => 'no_formulir']);
    }
}
