<?php

/**
 * Created by Sublime Text 3 IDEA.
 * User: YaangVu
 * Date: 2017/03/01
 * Time: 21:00
 */

/**
 * Class Migration_Init
 *
 * @property CI_DB_query_builder $db
 * @property CI_DB_forge         $dbforge
 */
class Migration_Init_database extends CI_Migration {

    public function up() {
        $this->_create_table_admin();
        $this->_create_table_user_dokomo();
        $this->_create_table_user_softbank();
    }

    private function _create_table_admin() {
        $sql = "CREATE TABLE IF NOT EXISTS `admin` (
                  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(150) NOT NULL,
                  `username` VARCHAR(150) NOT NULL,
                  `password` VARCHAR(150) NOT NULL,
                  `created_time` timestamp DEFAULT CURRENT_TIMESTAMP,
                  `created_by` INT(11) DEFAULT NULL,
                  `modified_time` datetime DEFAULT NULL,
                  `modified_by` INT(11) DEFAULT NULL,
                  `deleted_by` INT(11) DEFAULT NULL,
                  `deleted` int(11) DEFAULT '0',
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $this->db->query($sql);
    }

    private function _create_table_user_dokomo() {
        $sql = "CREATE TABLE IF NOT EXISTS `user_dokomo` (
                  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                  `fisrt_name` VARCHAR(150) NOT NULL,
                  `last_name` VARCHAR(150) NOT NULL,
                  `first_furigana` VARCHAR(150) NOT NULL,
                  `last_furigana` VARCHAR(150) NOT NULL,
                  `mail_address` VARCHAR(150) NOT NULL,
                  `password` VARCHAR(150) NOT NULL,
                  `store_name` VARCHAR(150) NOT NULL,
                  `store_id` VARCHAR(150) DEFAULT NULL,
                  `entry_status` INT(1) DEFAULT NULL,
                  `is_sky` INT(1) DEFAULT NULL,
                  `cash_num_sky` VARCHAR (50) DEFAULT NULL,
                  `is_penmium` INT(1) DEFAULT NULL,
                  `cash_num_premium` VARCHAR(50) DEFAULT NULL,
                  `is_premium_hikari` INT(1) DEFAULT NULL,
                  `cash_num_premium_hikari` VARCHAR(50) DEFAULT NULL,
                  `created_time` timestamp DEFAULT CURRENT_TIMESTAMP,
                  `created_by` INT(11) DEFAULT NULL,
                  `modified_time` datetime DEFAULT NULL,
                  `modified_by` INT(11) DEFAULT NULL,
                  `deleted_by` INT(11) DEFAULT NULL,
                  `deleted` int(11) DEFAULT '0',
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $this->db->query($sql);
    }

    private function _create_table_user_softbank() {
        $sql = "CREATE TABLE IF NOT EXISTS `user_softbank` (
                  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                  `fisrt_name` VARCHAR(150) NOT NULL,
                  `last_name` VARCHAR(150) NOT NULL,
                  `first_furigana` VARCHAR(150) NOT NULL,
                  `last_furigana` VARCHAR(150) NOT NULL,
                  `mail_address` VARCHAR(150) NOT NULL,
                  `password` VARCHAR(150) NOT NULL,
                  `store_name` VARCHAR(150) NOT NULL,
                  `store_id` VARCHAR(150) DEFAULT NULL,
                  `entry_status` INT(1) DEFAULT NULL,
                  `is_sky` INT(1) DEFAULT NULL,
                  `cash_num_sky` VARCHAR (50) DEFAULT NULL,
                  `is_penmium` INT(1) DEFAULT NULL,
                  `cash_num_premium` VARCHAR(50) DEFAULT NULL,
                  `is_premium_hikari` INT(1) DEFAULT NULL,
                  `cash_num_premium_hikari` VARCHAR(50) DEFAULT NULL,
                  `created_time` timestamp DEFAULT CURRENT_TIMESTAMP,
                  `created_by` INT(11) DEFAULT NULL,
                  `modified_time` datetime DEFAULT NULL,
                  `modified_by` INT(11) DEFAULT NULL,
                  `deleted_by` INT(11) DEFAULT NULL,
                  `deleted` int(11) DEFAULT '0',
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $this->db->query($sql);
    }

    public function down() {
        $this->_clear_database(FALSE);
    }

    private function _clear_database($if_exitst = FALSE) {
        $this->dbforge->drop_table('admin', $if_exitst);
        $this->dbforge->drop_table('user_dokomo', $if_exitst);
    }
}