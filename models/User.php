<?php

namespace app\models;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%user}}".
 * In Yii tables can have a prefix configured in config/db.php
 *
 * @property int $id primary key
 * @property string $name user name
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * Returns table name
     *
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%user}}';
    }

    /**
     * Validation rules for users entities
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name'], 'required', 'message' => 'Field {attribute} is required'],
            [
                ['name'],
                'string',
                'length' => [3, 30],
                'tooShort' => 'Name length must be at least 3 characters',
                'tooLong' => 'Name length must be not greater than 30 characters',
            ],
            [
                ['name'],
                'match',
                'pattern' => '/^([A-Za-z0-9])+$/u',
                'message' => 'Name can contain only letters and digits',
            ],
        ];
    }

    /**
     * Return labels
     *
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Links User and UserGroup models
     * We can access array of user's groups by $user->groups
     *
     * @return ActiveQuery
     * @throws InvalidConfigException when query is not initialized properly
     */
    public function getGroups(): ActiveQuery
    {
        return $this->hasMany(UserGroup::class, ['id' => 'gid'])
            ->viaTable('user2group', ['uid' => 'id']);
    }
}
