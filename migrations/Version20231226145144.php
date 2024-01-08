<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231226145144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etudiant_step2 (id INT AUTO_INCREMENT NOT NULL, etudiantstep2_id INT NOT NULL, niveau VARCHAR(255) NOT NULL, note_math VARCHAR(255) NOT NULL, note_franc VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_4AC357689DF440F5 (etudiantstep2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant_step3 (id INT AUTO_INCREMENT NOT NULL, e_step3_id INT NOT NULL, note_6eme VARCHAR(255) NOT NULL, note_bac VARCHAR(255) NOT NULL, attestation_reussite VARCHAR(255) NOT NULL, carte_nationale VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3DC467FE99227EE5 (e_step3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etudiant_step2 ADD CONSTRAINT FK_4AC357689DF440F5 FOREIGN KEY (etudiantstep2_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE etudiant_step3 ADD CONSTRAINT FK_3DC467FE99227EE5 FOREIGN KEY (e_step3_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE compte CHANGE etudiant_id etudiant_id INT NOT NULL');
        $this->addSql('ALTER TABLE etudiant ADD cne VARCHAR(255) NOT NULL, ADD cin VARCHAR(255) NOT NULL, ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD date_naissance DATE NOT NULL, ADD telephone VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD genre VARCHAR(255) NOT NULL, ADD ville VARCHAR(255) NOT NULL, ADD adresse_postale VARCHAR(255) NOT NULL, ADD nationalite VARCHAR(255) NOT NULL, ADD profession_pere VARCHAR(255) NOT NULL, ADD profession_mere VARCHAR(255) NOT NULL, ADD gsm_mere VARCHAR(255) NOT NULL, ADD gsm_pere VARCHAR(255) NOT NULL, ADD mot_passe VARCHAR(255) NOT NULL, ADD niveau VARCHAR(255) NOT NULL, ADD note_math VARCHAR(255) NOT NULL, ADD note_franc VARCHAR(255) NOT NULL, ADD note_6eme VARCHAR(255) NOT NULL, ADD note_bac VARCHAR(255) NOT NULL, ADD attestation_reussite VARCHAR(255) DEFAULT NULL, ADD carte_nationale VARCHAR(255) NOT NULL, ADD attestation_reussite1 VARCHAR(255) DEFAULT NULL, ADD attestation_reussite2 VARCHAR(255) DEFAULT NULL, ADD licence VARCHAR(255) DEFAULT NULL, ADD attestation_reussite4 VARCHAR(255) DEFAULT NULL, CHANGE status status TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant_step2 DROP FOREIGN KEY FK_4AC357689DF440F5');
        $this->addSql('ALTER TABLE etudiant_step3 DROP FOREIGN KEY FK_3DC467FE99227EE5');
        $this->addSql('DROP TABLE etudiant_step2');
        $this->addSql('DROP TABLE etudiant_step3');
        $this->addSql('ALTER TABLE compte CHANGE etudiant_id etudiant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etudiant DROP cne, DROP cin, DROP nom, DROP prenom, DROP date_naissance, DROP telephone, DROP email, DROP genre, DROP ville, DROP adresse_postale, DROP nationalite, DROP profession_pere, DROP profession_mere, DROP gsm_mere, DROP gsm_pere, DROP mot_passe, DROP niveau, DROP note_math, DROP note_franc, DROP note_6eme, DROP note_bac, DROP attestation_reussite, DROP carte_nationale, DROP attestation_reussite1, DROP attestation_reussite2, DROP licence, DROP attestation_reussite4, CHANGE status status TINYINT(1) NOT NULL');
    }
}
