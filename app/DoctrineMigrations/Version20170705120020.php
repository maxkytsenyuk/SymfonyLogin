<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170705120020 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

        /*$date = date('m/d/Y h:i:s a', time());*/
        $this->addSql("INSERT INTO player (surname, name, team, age) VALUES('Kytseniuk', 'Max', 'Ololo', '85'),('Millsap', 'Paul', 'Denver Nuggets', '32')");
        $this->addSql("INSERT INTO player (surname, name, team, age) VALUES('Horford', 'Al', 'Boston Celtic', '31'),('Hayward', 'Gordon', 'Boston Celtic', '27')");

        /*$this->addSql(" INSERT INTO fos_user (username, username_canonical, email, email_canonical, enabled, password, roles) VALUES ('leo','leo','leo@mymail.com','leo@mymail.com','1','54321','a:0:{}')");*/

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }

}
