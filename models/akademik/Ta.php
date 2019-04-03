<?php

namespace app\models\akademik;

use Yii;

/**
 * This is the model class for table "{{%ta}}".
 *
 * @property int $idThajaran
 * @property string $tahun
 * @property int $status
 * @property string $semester
 *
 * @property Surat[] $surats
 */
class Ta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ta}}';
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
            [['tahun', 'status', 'semester'], 'required'],
            [['status'], 'integer'],
            [['tahun'], 'string', 'max' => 50],
            [['semester'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idThajaran' => 'Id Thajaran',
            'tahun' => 'Tahun',
            'status' => 'Status',
            'semester' => 'Semester',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurats()
    {
        return $this->hasMany(Surat::className(), ['idThajaran' => 'idThajaran']);
    }
}
