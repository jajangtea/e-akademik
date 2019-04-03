<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "nilai_tugas".
 *
 * @property string $idnilai_tugas
 * @property int $idtugas_mk
 * @property string $idkrsmatkul
 * @property int $n_kuan
 *
 * @property TugasMk $tugasMk
 * @property Krsmatkul $krsmatkul
 */
class NilaiTugas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nilai_tugas';
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
            [['idtugas_mk', 'idkrsmatkul', 'n_kuan'], 'required'],
            [['idtugas_mk', 'idkrsmatkul', 'n_kuan'], 'integer'],
            [['idtugas_mk'], 'exist', 'skipOnError' => true, 'targetClass' => TugasMk::className(), 'targetAttribute' => ['idtugas_mk' => 'idtugas_mk']],
            [['idkrsmatkul'], 'exist', 'skipOnError' => true, 'targetClass' => Krsmatkul::className(), 'targetAttribute' => ['idkrsmatkul' => 'idkrsmatkul']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idnilai_tugas' => 'Idnilai Tugas',
            'idtugas_mk' => 'Idtugas Mk',
            'idkrsmatkul' => 'Idkrsmatkul',
            'n_kuan' => 'N Kuan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTugasMk()
    {
        return $this->hasOne(TugasMk::className(), ['idtugas_mk' => 'idtugas_mk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKrsmatkul()
    {
        return $this->hasOne(Krsmatkul::className(), ['idkrsmatkul' => 'idkrsmatkul']);
    }
}
