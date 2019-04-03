<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "profiles_mahasiswa".
 *
 * @property int $idprofile
 * @property int $no_formulir
 * @property string $email
 * @property string $nim
 * @property string $userpassword
 * @property string $theme
 * @property string $photo_profile
 *
 * @property FormulirPendaftaran $noFormulir
 */
class ProfilesMahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profiles_mahasiswa';
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
            [['no_formulir', 'email', 'nim', 'userpassword', 'photo_profile'], 'required'],
            [['no_formulir'], 'integer'],
            [['email'], 'string', 'max' => 200],
            [['nim'], 'string', 'max' => 20],
            [['userpassword'], 'string', 'max' => 60],
            [['theme'], 'string', 'max' => 25],
            [['photo_profile'], 'string', 'max' => 150],
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
            'idprofile' => 'Idprofile',
            'no_formulir' => 'No Formulir',
            'email' => 'Email',
            'nim' => 'Nim',
            'userpassword' => 'Userpassword',
            'theme' => 'Theme',
            'photo_profile' => 'Photo Profile',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoFormulir()
    {
        return $this->hasOne(FormulirPendaftaran::className(), ['no_formulir' => 'no_formulir']);
    }
}
