<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231225142823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte CHANGE etudiant_id etudiant_id INT NOT NULL');
        $this->addSql('ALTER TABLE etudiant ADD cne VARCHAR(255) NOT NULL, ADD cin VARCHAR(255) NOT NULL, ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD date_naissance DATE NOT NULL, ADD telephone VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD genre VARCHAR(255) NOT NULL, ADD ville VARCHAR(255) NOT NULL, ADD adresse_postale VARCHAR(255) NOT NULL, ADD nationalite VARCHAR(255) NOT NULL, ADD profession_pere VARCHAR(255) NOT NULL, ADD profession_mere VARCHAR(255) NOT NULL, ADD gsm_mere VARCHAR(255) NOT NULL, ADD gsm_pere VARCHAR(255) NOT NULL, ADD mot_passe VARCHAR(255) NOT NULL, ADD confirm_pass VARCHAR(255) NOT NULL, DROP status');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte CHANGE etudiant_id etudiant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etudiant ADD status TINYINT(1) NOT NULL, DROP cne, DROP cin, DROP nom, DROP prenom, DROP date_naissance, DROP telephone, DROP email, DROP genre, DROP ville, DROP adresse_postale, DROP nationalite, DROP profession_pere, DROP profession_mere, DROP gsm_mere, DROP gsm_pere, DROP mot_passe, DROP confirm_pass');
    }
}
