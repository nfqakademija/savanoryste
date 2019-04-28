<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190428112300 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE job CHANGE volunteer_id volunteer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE event CHANGE organisation_id organisation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE organisation ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE organisation ADD CONSTRAINT FK_E6E132B4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E6E132B4A76ED395 ON organisation (user_id)');
        $this->addSql('ALTER TABLE volunteer ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE volunteer ADD CONSTRAINT FK_5140DEDBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5140DEDBA76ED395 ON volunteer (user_id)');
        $this->addSql('ALTER TABLE review CHANGE volunteer_id volunteer_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event CHANGE organisation_id organisation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job CHANGE volunteer_id volunteer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE organisation DROP FOREIGN KEY FK_E6E132B4A76ED395');
        $this->addSql('DROP INDEX UNIQ_E6E132B4A76ED395 ON organisation');
        $this->addSql('ALTER TABLE organisation DROP user_id');
        $this->addSql('ALTER TABLE review CHANGE volunteer_id volunteer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
        $this->addSql('ALTER TABLE volunteer DROP FOREIGN KEY FK_5140DEDBA76ED395');
        $this->addSql('DROP INDEX UNIQ_5140DEDBA76ED395 ON volunteer');
        $this->addSql('ALTER TABLE volunteer DROP user_id');
    }
}
