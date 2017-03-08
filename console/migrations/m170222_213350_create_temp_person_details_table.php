<?php

use yii\db\Migration;

/**
 * Handles the creation of table `temp_person_details`.
 * Has foreign keys to the tables:
 *
 * - `temp_user`
 */
class m170222_213350_create_temp_person_details_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('temp_person_details', [
            'id' => $this->primaryKey(),
            'temp_user_id' => $this->integer()->notNull(),
            'title' => $this->smallInteger()->defaultValue(0),
            'first_name' => $this->string(30)->defaultValue(''),
            'last_name' => $this->string(30)->defaultValue(''),
            'unique_number' => $this->string(30)->defaultValue(''),
            'passport_number' => $this->string(30)->defaultValue(''),
            'contact_email' => $this->string(50)->defaultValue(''),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()->defaultValue("0000-00-00 00:00:00"),
        ]);

        // creates index for column `temp_user_id`
        $this->createIndex(
            'idx-temp_person_details-temp_user_id',
            'temp_person_details',
            'temp_user_id'
        );

        // add foreign key for table `temp_user`
        $this->addForeignKey(
            'fk-temp_person_details-temp_user_id',
            'temp_person_details',
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
            'fk-temp_person_details-temp_user_id',
            'temp_person_details'
        );

        // drops index for column `temp_user_id`
        $this->dropIndex(
            'idx-temp_person_details-temp_user_id',
            'temp_person_details'
        );

        $this->dropTable('temp_person_details');
    }
}
