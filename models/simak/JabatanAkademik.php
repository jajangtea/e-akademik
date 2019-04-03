<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "jabatan_akademik".
 *
 * @property int $idjabatan
 * @property string $nama_jabatan
 */
class JabatanAkademik extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jabatan_akademik';
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
            [['idjabatan', 'nama_jabatan'], 'required'],
            [['idjabatan'], 'integer'],
            [['nama_jabatan'], 'string', 'max' => 15],
            [['idjabatan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idjabatan' => 'Idjabatan',
            'nama_jabatan' => 'Nama Jabatan',
        ];
    }
}
