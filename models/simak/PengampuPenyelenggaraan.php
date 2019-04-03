<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "pengampu_penyelenggaraan".
 *
 * @property int $idpengampu_penyelenggaraan
 * @property string $idpenyelenggaraan
 * @property int $iddosen
 * @property int $verified
 *
 * @property KelasMhs[] $kelasMhs
 * @property KuesionerHasil $kuesionerHasil
 * @property KuesionerJawaban[] $kuesionerJawabans
 * @property Penyelenggaraan $penyelenggaraan
 */
class PengampuPenyelenggaraan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengampu_penyelenggaraan';
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
            [['idpenyelenggaraan', 'iddosen', 'verified'], 'required'],
            [['idpenyelenggaraan', 'iddosen', 'verified'], 'integer'],
            [['idpenyelenggaraan'], 'exist', 'skipOnError' => true, 'targetClass' => Penyelenggaraan::className(), 'targetAttribute' => ['idpenyelenggaraan' => 'idpenyelenggaraan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpengampu_penyelenggaraan' => 'Idpengampu Penyelenggaraan',
            'idpenyelenggaraan' => 'Idpenyelenggaraan',
            'iddosen' => 'Iddosen',
            'verified' => 'Verified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasMhs()
    {
        return $this->hasMany(KelasMhs::className(), ['idpengampu_penyelenggaraan' => 'idpengampu_penyelenggaraan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKuesionerHasil()
    {
        return $this->hasOne(KuesionerHasil::className(), ['idpengampu_penyelenggaraan' => 'idpengampu_penyelenggaraan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKuesionerJawabans()
    {
        return $this->hasMany(KuesionerJawaban::className(), ['idpengampu_penyelenggaraan' => 'idpengampu_penyelenggaraan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenyelenggaraan()
    {
        return $this->hasOne(Penyelenggaraan::className(), ['idpenyelenggaraan' => 'idpenyelenggaraan']);
    }
}
