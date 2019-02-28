<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user2group}}".
 * Used for convenient removing links between users and groups
 *
 * @property int $uid user id
 * @property int $gid group id
 */
class User2Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user2group}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'gid'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'gid' => 'Gid',
        ];
    }
}
