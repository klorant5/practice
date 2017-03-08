<?php

use yii\db\Migration;

/**
 * Handles adding tld_column_nationality_column_debt_collector to table `temp_user`.
 */
class m170305_194827_add_tld_column_nationality_column_debt_collector_column_to_temp_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('temp_user', 'tld', $this->smallInteger()->defaultValue(0));
        $this->addColumn('temp_user', 'nationality', $this->smallInteger()->defaultValue(0));
        $this->addColumn('temp_user', 'debt_collector', $this->smallInteger()->defaultValue(0));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('temp_user', 'tld');
        $this->dropColumn('temp_user', 'nationality');
        $this->dropColumn('temp_user', 'debt_collector');
    }
}
