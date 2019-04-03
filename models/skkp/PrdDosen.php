<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_dosen".
 *
 * @property string $KodeDosen
 * @property string $NamaDosen
 * @property string $Tlp
 * @property int $IdUser
 *
 * @property PrdUser $user
 * @property PrdJabatan[] $prdJabatans
 * @property PrdJadwalbimbingan[] $prdJadwalbimbingans
 * @property PrdPendaftaran[] $prdPendaftarans
 * @property PrdPendaftaran[] $prdPendaftarans0
 * @property PrdSidangdetil[] $prdSidangdetils
 * @property PrdSidangdetil[] $prdSidangdetils0
 */
class PrdDosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_dosen';
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
            [['KodeDosen'], 'required'],
            [['IdUser'], 'integer'],
            [['KodeDosen'], 'string', 'max' => 3],
            [['NamaDosen'], 'string', 'max' => 200],
            [['Tlp'], 'string', 'max' => 20],
            [['KodeDosen'], 'unique'],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => PrdUser::className(), 'targetAttribute' => ['IdUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KodeDosen' => 'Kode Dosen',
            'NamaDosen' => 'Nama Dosen',
            'Tlp' => 'Tlp',
            'IdUser' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(PrdUser::className(), ['id' => 'IdUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdJabatans()
    {
        return $this->hasMany(PrdJabatan::className(), ['KodeDosen' => 'KodeDosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdJadwalbimbingans()
    {
        return $this->hasMany(PrdJadwalbimbingan::className(), ['KodeDosen' => 'KodeDosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdPendaftarans()
    {
        return $this->hasMany(PrdPendaftaran::className(), ['KodePembimbing1' => 'KodeDosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdPendaftarans0()
    {
        return $this->hasMany(PrdPendaftaran::className(), ['KodePembimbing2' => 'KodeDosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdSidangdetils()
    {
        return $this->hasMany(PrdSidangdetil::className(), ['Penguji1' => 'KodeDosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdSidangdetils0()
    {
        return $this->hasMany(PrdSidangdetil::className(), ['Penguji2' => 'KodeDosen']);
    }
}
