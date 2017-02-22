<?php

use yii\db\Migration;

/**
 * Handles the creation of table `temp_company_details`.
 * Has foreign keys to the tables:
 *
 * - `temp_user`
 */
class m170222_213209_create_temp_company_details_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('temp_company_details', [
            'id' => $this->primaryKey(),
            'temp_user_id' => $this->integer()->notNull(),
            'company_name' => $this->string(200),
            'registration_number' => $this->string(30)->defaultValue(''),
            'duns_number' => $this->string(30)->defaultValue(''),
            'contact_name_id' => $this->integer()->defaultValue(0),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        // creates index for column `temp_user_id`
        $this->createIndex(
            'idx-temp_company_details-temp_user_id',
            'temp_company_details',
            'temp_user_id'
        );

        // add foreign key for table `temp_user`
        $this->addForeignKey(
            'fk-temp_company_details-temp_user_id',
            'temp_company_details',
            'temp_user_id',
            'temp_user',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `temp_user`
        $this->dropForeignKey(
            'fk-temp_company_details-temp_user_id',
            'temp_company_details'
        );

        // drops index for column `temp_user_id`
        $this->dropIndex(
            'idx-temp_company_details-temp_user_id',
            'temp_company_details'
        );

        $this->dropTable('temp_company_details');
    }
}
