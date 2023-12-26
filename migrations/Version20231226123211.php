<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231226123211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, cin VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, status TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_CFF65260DDEAB1A3 (etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, filiere_id INT NOT NULL, cne VARCHAR(255) NOT NULL, cin VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, adresse_postale VARCHAR(255) NOT NULL, nationalite VARCHAR(255) NOT NULL, profession_pere VARCHAR(255) NOT NULL, profession_mere VARCHAR(255) NOT NULL, gsm_mere VARCHAR(255) NOT NULL, gsm_pere VARCHAR(255) NOT NULL, mot_passe VARCHAR(255) NOT NULL, status TINYINT(1) DEFAULT NULL, niveau VARCHAR(255) NOT NULL, note_math VARCHAR(255) NOT NULL, note_franc VARCHAR(255) NOT NULL, note_6eme VARCHAR(255) NOT NULL, note_bac VARCHAR(255) NOT NULL, attestation_reussite VARCHAR(255) NOT NULL, carte_nationale VARCHAR(255) NOT NULL, attestation_reussite1 VARCHAR(255) DEFAULT NULL, attestation_reussite2 VARCHAR(255) DEFAULT NULL, licence VARCHAR(255) DEFAULT NULL, attestation_reussite4 VARCHAR(255) DEFAULT NULL, INDEX IDX_717E22E3180AA129 (filiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant_step2 (id INT AUTO_INCREMENT NOT NULL, etudiantstep2_id INT NOT NULL, niveau VARCHAR(255) NOT NULL, note_math VARCHAR(255) NOT NULL, note_franc VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_4AC357689DF440F5 (etudiantstep2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant_step3 (id INT AUTO_INCREMENT NOT NULL, e_step3_id INT NOT NULL, note_6eme VARCHAR(255) NOT NULL, note_bac VARCHAR(255) NOT NULL, attestation_reussite VARCHAR(255) NOT NULL, carte_nationale VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3DC467FE99227EE5 (e_step3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faculte (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, reconnaissance TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filiere (id INT AUTO_INCREMENT NOT NULL, faculte_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_2ED05D9E72C3434F (faculte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responsable (id INT AUTO_INCREMENT NOT NULL, faculte_id INT NOT NULL, cin VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_52520D0772C3434F (faculte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secretaire (id INT AUTO_INCREMENT NOT NULL, faculte_id INT NOT NULL, cin VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_7DB5C2D072C3434F (faculte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id)');
        $this->addSql('ALTER TABLE etudiant_step2 ADD CONSTRAINT FK_4AC357689DF440F5 FOREIGN KEY (etudiantstep2_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE etudiant_step3 ADD CONSTRAINT FK_3DC467FE99227EE5 FOREIGN KEY (e_step3_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE filiere ADD CONSTRAINT FK_2ED05D9E72C3434F FOREIGN KEY (faculte_id) REFERENCES faculte (id)');
        $this->addSql('ALTER TABLE responsable ADD CONSTRAINT FK_52520D0772C3434F FOREIGN KEY (faculte_id) REFERENCES faculte (id)');
        $this->addSql('ALTER TABLE secretaire ADD CONSTRAINT FK_7DB5C2D072C3434F FOREIGN KEY (faculte_id) REFERENCES faculte (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260DDEAB1A3');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3180AA129');
        $this->addSql('ALTER TABLE etudiant_step2 DROP FOREIGN KEY FK_4AC357689DF440F5');
        $this->addSql('ALTER TABLE etudiant_step3 DROP FOREIGN KEY FK_3DC467FE99227EE5');
        $this->addSql('ALTER TABLE filiere DROP FOREIGN KEY FK_2ED05D9E72C3434F');
        $this->addSql('ALTER TABLE responsable DROP FOREIGN KEY FK_52520D0772C3434F');
        $this->addSql('ALTER TABLE secretaire DROP FOREIGN KEY FK_7DB5C2D072C3434F');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE etudiant_step2');
        $this->addSql('DROP TABLE etudiant_step3');
        $this->addSql('DROP TABLE faculte');
        $this->addSql('DROP TABLE filiere');
        $this->addSql('DROP TABLE responsable');
        $this->addSql('DROP TABLE secretaire');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
