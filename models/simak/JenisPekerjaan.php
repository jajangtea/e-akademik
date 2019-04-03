<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "jenis_pekerjaan".
 *
 * @property int $idjp
 * @property string $nama_pekerjaan
 */
class JenisPekerjaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_pekerjaan';
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
            [['idjp', 'nama_pekerjaan'], 'required'],
            [['idjp'], 'integer'],
            [['nama_pekerjaan'], 'string', 'max' => 60],
            [['idjp'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idjp' => 'Idjp',
            'nama_pekerjaan' => 'Nama Pekerjaan',
        ];
    }
}
