<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240109101533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE list_dattente (id INT AUTO_INCREMENT NOT NULL, filiere_id INT DEFAULT NULL, cne VARCHAR(255) NOT NULL, cin VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, adresse_postale VARCHAR(255) NOT NULL, nationalite VARCHAR(255) NOT NULL, profession_pere VARCHAR(255) NOT NULL, profession_mere VARCHAR(255) NOT NULL, gsm_mere VARCHAR(255) NOT NULL, mot_passe VARCHAR(255) NOT NULL, confirm_pass VARCHAR(255) NOT NULL, status TINYINT(1) DEFAULT NULL, niveau VARCHAR(255) NOT NULL, note_math VARCHAR(255) NOT NULL, note_franc VARCHAR(255) NOT NULL, note_6eme VARCHAR(255) NOT NULL, note_ba VARCHAR(255) NOT NULL, attestation_reussite VARCHAR(255) NOT NULL, carte_nationale VARCHAR(255) NOT NULL, attestation_reussite1 VARCHAR(255) NOT NULL, attestation_reussite2 VARCHAR(255) NOT NULL, attestation_reussite4 VARCHAR(255) NOT NULL, INDEX IDX_C6F4C4FF180AA129 (filiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE list_dattente ADD CONSTRAINT FK_C6F4C4FF180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE list_dattente DROP FOREIGN KEY FK_C6F4C4FF180AA129');
        $this->addSql('DROP TABLE list_dattente');
    }
}
