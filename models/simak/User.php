<?php

namespace app\models\simak;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $userid
 * @property int $idbank
 * @property string $username
 * @property string $userpassword
 * @property string $salt
 * @property string $page
 * @property int $group_id
 * @property int $kjur
 * @property string $nama
 * @property string $email
 * @property int $active
 * @property int $isdeleted
 * @property string $theme
 * @property string $foto
 * @property string $token
 * @property string $ipaddress
 * @property string $logintime
 * @property string $date_added
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
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
            [['idbank', 'username', 'userpassword', 'salt', 'group_id', 'kjur', 'nama', 'email', 'theme', 'foto', 'logintime', 'date_added'], 'required'],
            [['idbank', 'group_id', 'kjur', 'active', 'isdeleted'], 'integer'],
            [['page'], 'string'],
            [['logintime', 'date_added'], 'safe'],
            [['username'], 'string', 'max' => 40],
            [['userpassword', 'email'], 'string', 'max' => 150],
            [['salt'], 'string', 'max' => 7],
            [['nama', 'foto'], 'string', 'max' => 70],
            [['theme'], 'string', 'max' => 10],
            [['token', 'ipaddress'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'idbank' => 'Idbank',
            'username' => 'Username',
            'userpassword' => 'Userpassword',
            'salt' => 'Salt',
            'page' => 'Page',
            'group_id' => 'Group ID',
            'kjur' => 'Kjur',
            'nama' => 'Nama',
            'email' => 'Email',
            'active' => 'Active',
            'isdeleted' => 'Isdeleted',
            'theme' => 'Theme',
            'foto' => 'Foto',
            'token' => 'Token',
            'ipaddress' => 'Ipaddress',
            'logintime' => 'Logintime',
            'date_added' => 'Date Added',
        ];
    }
}
