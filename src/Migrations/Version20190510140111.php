<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190510140111 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE job_type (id INT AUTO_INCREMENT NOT NULL, job_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job ADD job_type_id INT DEFAULT NULL, DROP job_type, CHANGE volunteer_id volunteer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F85FA33B08 FOREIGN KEY (job_type_id) REFERENCES job_type (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FBD8E0F85FA33B08 ON job (job_type_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE event CHANGE organisation_id organisation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE organisation CHANGE user_id user_id INT DEFAULT NULL, CHANGE profile_pic profile_pic VARCHAR(255) DEFAULT \'OrganisationPic.jpeg\' NOT NULL');
        $this->addSql('ALTER TABLE volunteer CHANGE user_id user_id INT DEFAULT NULL, CHANGE profile_pic profile_pic VARCHAR(255) DEFAULT \'VolunteerPic.jpeg\' NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F85FA33B08');
        $this->addSql('DROP TABLE job_type');
        $this->addSql('ALTER TABLE event CHANGE organisation_id organisation_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_FBD8E0F85FA33B08 ON job');
        $this->addSql('ALTER TABLE job ADD job_type VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP job_type_id, CHANGE volunteer_id volunteer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE organisation CHANGE profile_pic profile_pic VARCHAR(255) DEFAULT \'\'OrganisationPic.jpeg\'\' NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
        $this->addSql('ALTER TABLE volunteer CHANGE profile_pic profile_pic VARCHAR(255) DEFAULT \'\'VolunteerPic.jpeg\'\' NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE user_id user_id INT DEFAULT NULL');
    }
}
