<?php

use yii\db\Migration;
use yii\db\Schema;

class m170808_080941_create_tables extends Migration
{
    public function safeUp()
    {
    $tableOptions = null;
    if ($this->db->driverName === 'mysql') {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
    }
    $this->createTable('{{%user}}', [
        'id' => Schema::TYPE_PK,
        'username' => Schema::TYPE_STRING . ' NOT NULL',
        'password' => Schema::TYPE_STRING . ' NOT NULL',
        'auth_key' => Schema::TYPE_STRING . ' NOT NULL',
        'token' => Schema::TYPE_STRING . ' NOT NULL',
        'email' => Schema::TYPE_STRING . ' NOT NULL'
    ], $tableOptions);
    $this->createIndex('username', '{{%user}}', 'username', true);
    $this->createTable('{{%users}}', [
        'id' => Schema::TYPE_PK,
        'username' => Schema::TYPE_STRING . ' NOT NULL',
        'email' => Schema::TYPE_STRING . ' NOT NULL'
    ], $tableOptions);
    $this->createTable('{{%comments}}', [
        'id' => Schema::TYPE_PK,
        'user_id' => Schema::TYPE_INTEGER,
        'post_id' => Schema::TYPE_INTEGER,
        'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        'content' => Schema::TYPE_TEXT . ' NOT NULL',
    ], $tableOptions);
    $this->createTable('{{%category}}', [
        'id' => Schema::TYPE_PK,
        'name' => Schema::TYPE_STRING . ' NOT NULL',
        'description' => Schema::TYPE_STRING,
        'image' => Schema::TYPE_BINARY,
        'image_src_filename' => Schema::TYPE_STRING . ' NOT NULL',
        'image_web_filename' => Schema::TYPE_STRING . ' NOT NULL'
   ], $tableOptions);
    $this->createIndex('name', '{{%category}}', 'name', true);
    $this->createTable('{{%post}}', [
        'id' => Schema::TYPE_PK,
        'author_id' => Schema::TYPE_INTEGER,
        'title' => Schema::TYPE_STRING . ' NOT NULL',
        'content' => Schema::TYPE_TEXT . ' NOT NULL',
        'category_id' => Schema::TYPE_INTEGER,
        'status' => Schema::TYPE_SMALLINT . ' NOT NULL',
        'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        'image' => Schema::TYPE_BINARY,
        'image_src_filename' => Schema::TYPE_STRING . ' NOT NULL',
        'image_web_filename' => Schema::TYPE_STRING . ' NOT NULL',
        'tags' => Schema::TYPE_STRING 
      ], $tableOptions);
    $this->createIndex('status', '{{%post}}', 'status');
    $this->createIndex('FK_category_post', '{{%post}}', 'category_id');
    $this->createIndex('FK_author_post', '{{%post}}', 'author_id');
    $this->addForeignKey("FK_category_post", "{{%post}}", "category_id", "{{%category}}", "id", 'SET NULL', 'CASCADE'); 
    $this->addForeignKey("FK_author_post", "{{%post}}", "author_id", "{{%user}}", "id", 'SET NULL', 'CASCADE'); 
    $this->createIndex('FK_comment_post', '{{%comments}}', 'post_id');
    $this->createIndex('FK_comment_users', '{{%comments}}', 'user_id');
    $this->addForeignKey("FK_comment_post", "{{%comments}}", "post_id", "{{%post}}", "id", 'SET NULL', 'CASCADE'); 
    $this->addForeignKey("FK_comment_users", "{{%comments}}", "user_id", "{{%users}}", "id", 'SET NULL', 'CASCADE'); 
    $this->execute($this->addUserSql());

    }
    
private function addUserSql()
{
    $password = Yii::$app->security->generatePasswordHash('admin');
    $auth_key = Yii::$app->security->generateRandomString();
    $token = Yii::$app->security->generateRandomString() . '_' . time();
    $password_d = Yii::$app->security->generatePasswordHash('demo');
    $auth_key_d = Yii::$app->security->generateRandomString();
    $token_d = Yii::$app->security->generateRandomString() . '_' . time();
    return "INSERT INTO {{%user}} (`username`, `email`, `password`, `auth_key`, `token`) VALUES ('admin', 'optimist_it@mail.ru', '$password', '$auth_key', '$token');".
    "INSERT INTO {{%user}} (`username`, `email`, `password`, `auth_key`, `token`) VALUES ('demo', 'optimist_demo@mail.ru', '$password_d', '$auth_key_d', '$token_d')"; 
    }
    
    public function safeDown()
    {
        echo "m170726_084015_create_tables cannot be reverted.\n";
        $this->dropTable('{{%post}}');
        $this->dropTable('{{%category}}');
        $this->dropTable('{{%comments}}');
        $this->dropTable('{{%users}}');
        $this->dropTable('{{%user}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170726_084015_create_tables cannot be reverted.\n";

        return false;
    }
    */
}
