<?php

use yii\db\Migration;

/**
 * Class m180503_121104_create_new_tables_with_data
 */
class m180503_121104_create_new_tables_with_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180503_121104_create_new_tables_with_data cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->execute("CREATE TABLE note
                        (
                          id          INT AUTO_INCREMENT
                            PRIMARY KEY,
                          user_id     INT      NOT NULL,
                          create_date DATETIME NULL,
                          note_data   TEXT     NOT NULL,
                          note_topic  CHAR(50) NOT NULL,
                          CONSTRAINT note_id_uindex
                          UNIQUE (id)
                        );
                        ");
        $this->execute("
INSERT INTO note (user_id, create_date, note_data, note_topic) VALUES (1, '2017-12-28 01:42:24', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu', 'sounds of Lorem');
INSERT INTO note (user_id, create_date, note_data, note_topic) VALUES (1, '2018-11-28 11:41:00', 'Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper uis ante.', 'Etiam');
INSERT INTO note (user_id, create_date, note_data, note_topic) VALUES (1, '2017-02-20 10:21:43', 'Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mols, ipsum.', 'Fusce');
INSERT INTO note (user_id, create_date, note_data, note_topic) VALUES (2, '2018-03-20 10:21:54', 'Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum. Nullam nulla eros, ultriciet, leo.', 'Aenean');
INSERT INTO note (user_id, create_date, note_data, note_topic) VALUES (2, '2017-05-20 14:21:34', 'Maecenas malesuada. Praesent congue erat at massa. Sed cursus turpis vitae tortor. Donec posuere vulputate arcu. Phasellus accumsan cursus velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac placis lacus.', 'Curae');
INSERT INTO note (user_id, create_date, note_data, note_topic) VALUES (2, '2017-01-20 14:21:23', 'Donec elit libero, sodales nec, volutpat a, suscipit non, turpis. Nullam sagittis. Suspendisse pulvinar, augue ac venenatis condimentum, sem libero volutpat nibh, nec pellentesque velit pede quis nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posue pretium.', 'sounds');
INSERT INTO note (user_id, create_date, note_data, note_topic) VALUES (3, '2018-10-20 15:41:56', 'Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla.', 'ultricies');
INSERT INTO note (user_id, create_date, note_data, note_topic) VALUES (3, '2015-11-10 17:46:45', 'Ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum.', 'Ipsumus 123');
INSERT INTO note (user_id, create_date, note_data, note_topic) VALUES (3, '2015-09-10 10:46:25', 'Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui.', 'No nummy sp');
INSERT INTO note (user_id, create_date, note_data, note_topic) VALUES (4, '2016-08-10 22:46:54', 'Aenean ut eros et nisl sagittis vestibulum. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. Sed lectus. Donec mollis hendrerit risus. Phasellus nec sem in justo pellentesque facilisis. Etiam imperdiet imperdiet orci.', 'Phasellusas');
INSERT INTO note (user_id, create_date, note_data, note_topic) VALUES (4, '2017-07-20 10:46:23', 'Как бы выразить, как бы вдохнуть в рисунок то, что так полно, так трепетно живет во мне, запечатлеть отражение моей души, как душа моя - отражение предвечного бога!', 'моя душа');
INSERT INTO note (user_id, create_date, note_data, note_topic) VALUES (4, '2018-03-30 13:46:34', 'Душа моя озарена неземной радостью, как эти чудесные весенние утра, которыми я наслаждаюсь от всего сердца.', 'от всего сердца');
INSERT INTO note (user_id, create_date, note_data, note_topic) VALUES (4, '2016-02-22 15:56:41', 'Я совсем один и блаженствую в здешнем краю, словно созданном для таких, как я. Я так счастлив, мой друг, так упоен ощущением покоя, что искусство мое страдает от этого.', 'ощущение покоя');
INSERT INTO note (user_id, create_date, note_data, note_topic) VALUES (4, '2016-01-10 23:56:11', 'Грустный реторический вопрос скатился по его щеке и он продолжил свой путь. По дороге встретил текст рукопись. Она предупредила его: «В моей стране все переписывается по несколько раз.', 'Рукопись');
");


        $this->execute("CREATE TABLE user
                        (
                          id            INT AUTO_INCREMENT
                            PRIMARY KEY,
                          user_name     CHAR(50)  NOT NULL,
                          online_status INT       NULL,
                          pas_md5       CHAR(255) NOT NULL,
                          cook_key      CHAR(50)  NULL,
                          email         CHAR(50)  NOT NULL,
                          reg_date      DATE      NOT NULL,
                          CONSTRAINT user_id_uindex
                          UNIQUE (id),
                          CONSTRAINT user_user_name_uindex
                          UNIQUE (user_name),
                          CONSTRAINT user_email_uindex
                          UNIQUE (email)
                        );
                        ");

        ;$this->execute("
INSERT INTO user (user_name, online_status, pas_md5, cook_key, email, reg_date) VALUES ('John', 0, '4ffbf9f586b58c2035d5f27e4c964e0c0b82861a', null, 'j@bk.ru', '2012-12-08');
INSERT INTO user (user_name, online_status, pas_md5, cook_key, email, reg_date) VALUES ('Ringo', 0, '4ffbf9f586b58c2035d5f27e4c964e0c0b82861a', null, 'r@bk.ru', '2017-07-06');
INSERT INTO user (user_name, online_status, pas_md5, cook_key, email, reg_date) VALUES ('Paul', 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', null, 'p@bk.ru', '2016-06-18');
INSERT INTO user (user_name, online_status, pas_md5, cook_key, email, reg_date) VALUES ('George', 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', null, 'g@bk.ru', '2015-11-29');
");

    }

    public function down()
    {
//        echo "m180503_121104_create_new_tables_with_data cannot be reverted.\n";
//        return false;

        $this->dropTable('note');
        $this->dropTable('user');
    }

}
