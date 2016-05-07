<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160507223636 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {

        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('INSERT INTO `user` (`id`, `username`, `Password`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, \'user\', \'$2y$13$i7cdLd1baw6imnueaDfm0OMB/yE0r3C6h/xDzmSvy5J1qGuKGywIi\', \'user\', \'user@user.fr\', \'user@user.fr\', 1, \'3g7pts5yehgk4wowcsc0so8kco448oc\', \'2016-05-04 11:46:43\', 0, 0, NULL, NULL, NULL, \'a:0:{}\', 0, NULL);');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {

        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql("DELETE FROM `rmitest`.`user` WHERE `user`.`username` = 'user'");

    }
}
