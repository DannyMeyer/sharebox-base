<?php
    /** @noinspection AutoloadingIssuesInspection */
    /** @noinspection PhpUnused */
    declare(strict_types=1);

    use Phinx\Migration\AbstractMigration;

    class Initial extends AbstractMigration
    {
        public function up(): void
        {
            $this->execute('
                CREATE TABLE `map_short` (
                    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                    `short` VARCHAR(50) NULL DEFAULT NULL,
                    `type` ENUM("url","image","text") NULL DEFAULT "url",
                    `mimetype` VARCHAR(50) NULL DEFAULT "text/plain",
                    `hash` VARCHAR(128) NULL DEFAULT NULL,
                    `time_created` TIMESTAMP NULL DEFAULT NULL,
                    `time_last_used` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    `valid` ENUM("infinite","lifetime","access") NOT NULL DEFAULT "infinite",
                    `valid_value` INT UNSIGNED NOT NULL DEFAULT "0",
                    `access_count` SMALLINT UNSIGNED NOT NULL DEFAULT "0",
                    `add_count` SMALLINT UNSIGNED NOT NULL DEFAULT "1",
                    PRIMARY KEY (`id`),
                    UNIQUE INDEX `type_hash_valid_valid_value` (`type`, `hash`, `valid`, `valid_value`),
                    INDEX `short` (`short`),
                    INDEX `time_last_used` (`time_last_used`),
                    INDEX `url_hash` (`hash`),
                    INDEX `access_count` (`access_count`),
                    INDEX `time_created` (`time_created`),
                    INDEX `type` (`type`),
                    INDEX `mimetype` (`mimetype`),
                    INDEX `valid` (`valid`),
                    INDEX `valid_value` (`valid_value`)
                )
                COLLATE="utf8mb4_general_ci"
                ENGINE=InnoDB
                AUTO_INCREMENT=10000
            ');
        }

        public function down(): void
        {
            $this->execute('DROP TABLE `map_short`');
        }
    }
