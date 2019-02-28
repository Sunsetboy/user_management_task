<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user2group}}".
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
            [['uid', 'gid'], 'required'],
            [['uid', 'gid'], 'integer'],
            [['uid', 'gid'], 'unique', 'targetAttribute' => ['uid', 'gid']],
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
