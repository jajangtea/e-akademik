<?php

namespace app\models\skkp;

use Yii;

/**
 * This is the model class for table "prd_user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $saltPassword
 * @property string $email
 * @property string $joinDate
 * @property int $level_id
 * @property string $avatar
 *
 * @property PrdDosen[] $prdDosens
 * @property PrdMahasiswa[] $prdMahasiswas
 * @property PrdPembimbing[] $prdPembimbings
 * @property PrdPengujikp[] $prdPengujikps
 * @property PrdPengujiskripsi[] $prdPengujiskripsis
 * @property PrdLevel $level
 */
class PrdUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prd_user';
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
            [['username', 'password', 'saltPassword', 'email', 'level_id'], 'required'],
            [['joinDate'], 'safe'],
            [['level_id'], 'integer'],
            [['username'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 255],
            [['saltPassword', 'email'], 'string', 'max' => 50],
            [['avatar'], 'string', 'max' => 30],
            [['username'], 'unique'],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => PrdLevel::className(), 'targetAttribute' => ['level_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'saltPassword' => 'Salt Password',
            'email' => 'Email',
            'joinDate' => 'Join Date',
            'level_id' => 'Level ID',
            'avatar' => 'Avatar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdDosens()
    {
        return $this->hasMany(PrdDosen::className(), ['IdUser' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdMahasiswas()
    {
        return $this->hasMany(PrdMahasiswa::className(), ['IdUser' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdPembimbings()
    {
        return $this->hasMany(PrdPembimbing::className(), ['idDosen' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdPengujikps()
    {
        return $this->hasMany(PrdPengujikp::className(), ['idUser' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrdPengujiskripsis()
    {
        return $this->hasMany(PrdPengujiskripsi::className(), ['idUser' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(PrdLevel::className(), ['id' => 'level_id']);
    }
}
