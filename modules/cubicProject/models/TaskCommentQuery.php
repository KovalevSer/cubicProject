<?php

namespace app\modules\cubicProject\models;

/**
 * This is the ActiveQuery class for [[TaskComment]].
 *
 * @see TaskComment
 */
class TaskCommentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TaskComment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TaskComment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}