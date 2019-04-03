<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "program_studi".
 *
 * @property int $kjur
 * @property string $kode_epsbed
 * @property string $nama_ps
 * @property string $nama_ps_alias
 * @property string $kjenjang
 * @property string $konsentrasi
 * @property int $idkur
 * @property int $iddosen
 *
 * @property DataKonversi2[] $dataKonversi2s
 * @property FormulirPendaftaran[] $formulirPendaftarans
 * @property FormulirPendaftaran[] $formulirPendaftarans0
 * @property RegisterMahasiswa[] $registerMahasiswas
 */
class ProgramStudi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'program_studi';
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
            [['kjur', 'kode_epsbed', 'nama_ps', 'nama_ps_alias', 'kjenjang', 'konsentrasi', 'idkur', 'iddosen'], 'required'],
            [['kjur', 'idkur', 'iddosen'], 'integer'],
            [['kode_epsbed'], 'string', 'max' => 5],
            [['nama_ps'], 'string', 'max' => 30],
            [['nama_ps_alias'], 'string', 'max' => 6],
            [['kjenjang'], 'string', 'max' => 1],
            [['konsentrasi'], 'string', 'max' => 40],
            [['kjur'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kjur' => 'Kjur',
            'kode_epsbed' => 'Kode Epsbed',
            'nama_ps' => 'Nama Ps',
            'nama_ps_alias' => 'Nama Ps Alias',
            'kjenjang' => 'Kjenjang',
            'konsentrasi' => 'Konsentrasi',
            'idkur' => 'Idkur',
            'iddosen' => 'Iddosen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataKonversi2s()
    {
        return $this->hasMany(DataKonversi2::className(), ['kjur' => 'kjur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormulirPendaftarans()
    {
        return $this->hasMany(FormulirPendaftaran::className(), ['kjur1' => 'kjur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormulirPendaftarans0()
    {
        return $this->hasMany(FormulirPendaftaran::className(), ['kjur2' => 'kjur']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegisterMahasiswas()
    {
        return $this->hasMany(RegisterMahasiswa::className(), ['kjur' => 'kjur']);
    }
}
