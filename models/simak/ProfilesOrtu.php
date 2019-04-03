<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "profiles_ortu".
 *
 * @property int $idprofile
 * @property string $username
 * @property string $email
 * @property string $nim
 * @property string $userpassword
 * @property string $theme
 */
class ProfilesOrtu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profiles_ortu';
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
            [['username', 'email', 'nim', 'userpassword'], 'required'],
            [['username'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 200],
            [['nim'], 'string', 'max' => 20],
            [['userpassword'], 'string', 'max' => 60],
            [['theme'], 'string', 'max' => 25],
            [['nim'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idprofile' => 'Idprofile',
            'username' => 'Username',
            'email' => 'Email',
            'nim' => 'Nim',
            'userpassword' => 'Userpassword',
            'theme' => 'Theme',
        ];
    }
}
