<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231225144532 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etudiant_step2 (id INT AUTO_INCREMENT NOT NULL, etudiantstep2_id INT NOT NULL, niveau VARCHAR(255) NOT NULL, note_math VARCHAR(255) NOT NULL, note_franc VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_4AC357689DF440F5 (etudiantstep2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etudiant_step2 ADD CONSTRAINT FK_4AC357689DF440F5 FOREIGN KEY (etudiantstep2_id) REFERENCES etudiant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant_step2 DROP FOREIGN KEY FK_4AC357689DF440F5');
        $this->addSql('DROP TABLE etudiant_step2');
    }
}
