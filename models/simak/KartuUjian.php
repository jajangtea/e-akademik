<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "kartu_ujian".
 *
 * @property int $no_formulir
 * @property string $no_ujian
 * @property string $tgl_ujian
 * @property string $tgl_selesai_ujian
 * @property int $isfinish
 * @property int $idtempat_spmb
 *
 * @property JawabanUjian[] $jawabanUjians
 * @property FormulirPendaftaran $noFormulir
 */
class KartuUjian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kartu_ujian';
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
            [['no_formulir', 'no_ujian', 'tgl_ujian', 'tgl_selesai_ujian', 'idtempat_spmb'], 'required'],
            [['no_formulir', 'isfinish', 'idtempat_spmb'], 'integer'],
            [['tgl_ujian', 'tgl_selesai_ujian'], 'safe'],
            [['no_ujian'], 'string', 'max' => 25],
            [['no_formulir'], 'unique'],
            [['no_formulir'], 'exist', 'skipOnError' => true, 'targetClass' => FormulirPendaftaran::className(), 'targetAttribute' => ['no_formulir' => 'no_formulir']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_formulir' => 'No Formulir',
            'no_ujian' => 'No Ujian',
            'tgl_ujian' => 'Tgl Ujian',
            'tgl_selesai_ujian' => 'Tgl Selesai Ujian',
            'isfinish' => 'Isfinish',
            'idtempat_spmb' => 'Idtempat Spmb',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJawabanUjians()
    {
        return $this->hasMany(JawabanUjian::className(), ['no_formulir' => 'no_formulir']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoFormulir()
    {
        return $this->hasOne(FormulirPendaftaran::className(), ['no_formulir' => 'no_formulir']);
    }
}
