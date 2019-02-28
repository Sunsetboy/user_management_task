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

    // Used in forms
    public $groupIds = [];

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
            [['groupIds'], 'each', 'rule' => ['integer']],
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
            'groupIds' => 'Member of groups',
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

    /**
     * Executed after querying a user
     * Populates the array of user's groups ids
     */
    public function afterFind(): void
    {
        parent::afterFind();

        foreach ($this->groups as $group) {
            $this->groupIds[] = $group->id;
        }
    }

    /**
     * Method that is called after saving a model
     *
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes): void
    {
        // remove all links between current user and groups
        User2Group::deleteAll(['uid' => $this->id]);

        if (is_array($this->groupIds)) {
            foreach ($this->groupIds as $groupId) {
                $user2group = new User2Group();
                $user2group->uid = $this->id;
                $user2group->gid = $groupId;
                $user2group->save();
            }
        }

        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * Returns an array of user groups names
     *
     * @return array
     */
    public function getGroupsNames(): array
    {
        $userGroups = $this->groups;
        $groupsNamesArray = [];
        foreach ($userGroups as $group) {
            $groupName = $group->name;
            $groupsNamesArray[] = $groupName;
        }
        return $groupsNamesArray;
    }
}
