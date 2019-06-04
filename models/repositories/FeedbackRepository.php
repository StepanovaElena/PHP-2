<?php


namespace app\models\repositories;


use app\models\entities\Feedback;
use app\models\Repository;

class FeedbackRepository extends Repository
{
    public function getTableName()
    {
        return 'feedback';
    }

    public function getEntityClass()
    {
        return Feedback::class;
    }
}