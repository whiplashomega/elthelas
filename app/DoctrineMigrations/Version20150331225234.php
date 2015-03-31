<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150331225234 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE race_racialtraits DROP FOREIGN KEY FK_D87C7EB2C39312F');
        $this->addSql('ALTER TABLE race_racialtraits DROP FOREIGN KEY FK_D87C7EB35DC61A0');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE race_racialtraits');
        $this->addSql('DROP TABLE racialtraits');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, subraceof INT NOT NULL, lifespan INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race_racialtraits (race_source INT NOT NULL, race_target INT NOT NULL, INDEX IDX_D87C7EB35DC61A0 (race_source), INDEX IDX_D87C7EB2C39312F (race_target), PRIMARY KEY(race_source, race_target)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE racialtraits (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, system VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE race_racialtraits ADD CONSTRAINT FK_D87C7EB2C39312F FOREIGN KEY (race_target) REFERENCES race (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE race_racialtraits ADD CONSTRAINT FK_D87C7EB35DC61A0 FOREIGN KEY (race_source) REFERENCES race (id) ON DELETE CASCADE');
    }
}
