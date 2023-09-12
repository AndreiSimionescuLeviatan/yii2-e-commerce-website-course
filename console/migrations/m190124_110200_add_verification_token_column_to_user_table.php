<?php

use \yii\db\Migration;

class m190124_110200_add_verification_token_column_to_user_table extends Migration
{
    public function up()
    {
        if(!Yii::$app->db->schema->getTableSchema('{{%user}}')->getColumn('verification_token'))
        {
            $this->addColumn('{{%user}}', 'verification_token', $this->string()->defaultValue(null));
        }
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'verification_token');
    }
}
