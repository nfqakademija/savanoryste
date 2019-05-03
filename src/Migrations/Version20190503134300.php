<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190503134300 extends AbstractMigration
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
        $this->addSql('ALTER TABLE organisation ADD profile_pic VARCHAR(255) DEFAULT \'OrganisationPic.jpeg\' NOT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE volunteer ADD profile_pic VARCHAR(255) DEFAULT \'VolunteerPic.jpeg\' NOT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE review CHANGE volunteer_id volunteer_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event CHANGE organisation_id organisation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job CHANGE volunteer_id volunteer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE organisation DROP profile_pic, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE review CHANGE volunteer_id volunteer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
        $this->addSql('ALTER TABLE volunteer DROP profile_pic, CHANGE user_id user_id INT DEFAULT NULL');
    }
}
