<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "log_master".
 *
 * @property string $idlog_master
 * @property int $userid
 * @property string $tipe_id
 *
 * @property LogNilaiMatakuliah[] $logNilaiMatakuliahs
 * @property LogTranskripAsli[] $logTranskripAslis
 */
class LogMaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log_master';
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
            [['userid', 'tipe_id'], 'required'],
            [['userid'], 'integer'],
            [['tipe_id'], 'string', 'max' => 1],
            [['userid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idlog_master' => 'Idlog Master',
            'userid' => 'Userid',
            'tipe_id' => 'Tipe ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogNilaiMatakuliahs()
    {
        return $this->hasMany(LogNilaiMatakuliah::className(), ['idlog_master' => 'idlog_master']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogTranskripAslis()
    {
        return $this->hasMany(LogTranskripAsli::className(), ['idlog_master' => 'idlog_master']);
    }
}
