<?php

use yii\db\Migration;

/**
 * Handles the creation of table `company_details`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m170222_212312_create_company_details_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('company_details', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'company_name' => $this->string(200),
            'registration_number' => $this->string(30)->defaultValue(''),
            'duns_number' => $this->string(30)->defaultValue(''),
            'contact_name_title' => $this->smallInteger()->defaultValue(0),
            'contact_name_first' => $this->string(100)->defaultValue(''),
            'contact_name_last' => $this->string(100)->defaultValue(''),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()->defaultValue("0000-00-00 00:00:00"),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-company_details-user_id',
            'company_details',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-company_details-user_id',
            'company_details',
            'user_id',
            'user',
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
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-company_details-user_id',
            'company_details'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-company_details-user_id',
            'company_details'
        );

        $this->dropTable('company_details');
    }
}
