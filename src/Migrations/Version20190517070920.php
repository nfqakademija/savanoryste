<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190517070920 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE job CHANGE volunteer_id volunteer_id INT DEFAULT NULL, CHANGE job_type_id job_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD profile_id INT NOT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE event CHANGE organisation_id organisation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE organisation DROP user_id, CHANGE profile_pic profile_pic VARCHAR(255) DEFAULT \'OrganisationPic.jpeg\' NOT NULL');
        $this->addSql('ALTER TABLE volunteer DROP user_id, CHANGE profile_pic profile_pic VARCHAR(255) DEFAULT \'VolunteerPic.jpeg\' NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE event CHANGE organisation_id organisation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job CHANGE volunteer_id volunteer_id INT DEFAULT NULL, CHANGE job_type_id job_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE organisation ADD user_id INT DEFAULT NULL, CHANGE profile_pic profile_pic VARCHAR(255) DEFAULT \'\'OrganisationPic.jpeg\'\' NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user DROP profile_id, CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
        $this->addSql('ALTER TABLE volunteer ADD user_id INT DEFAULT NULL, CHANGE profile_pic profile_pic VARCHAR(255) DEFAULT \'\'VolunteerPic.jpeg\'\' NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}