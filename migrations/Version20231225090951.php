<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231225090951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin ADD cin VARCHAR(255) NOT NULL, ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD numero VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE compte ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD status TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE etudiant ADD status TINYINT(1) NOT NULL, CHANGE filiere_id filiere_id INT NOT NULL');
        $this->addSql('ALTER TABLE faculte ADD nom VARCHAR(255) NOT NULL, ADD reconnaissance TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE filiere ADD nom VARCHAR(255) NOT NULL, CHANGE faculte_id faculte_id INT NOT NULL');
        $this->addSql('ALTER TABLE responsable ADD cin VARCHAR(255) NOT NULL, ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD image VARCHAR(255) NOT NULL, CHANGE faculte_id faculte_id INT NOT NULL');
        $this->addSql('ALTER TABLE secretaire ADD cin VARCHAR(255) NOT NULL, ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD image VARCHAR(255) NOT NULL, CHANGE faculte_id faculte_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin DROP cin, DROP nom, DROP prenom, DROP numero, DROP email, DROP password');
        $this->addSql('ALTER TABLE compte DROP email, DROP password, DROP status');
        $this->addSql('ALTER TABLE etudiant DROP status, CHANGE filiere_id filiere_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE faculte DROP nom, DROP reconnaissance');
        $this->addSql('ALTER TABLE filiere DROP nom, CHANGE faculte_id faculte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE responsable DROP cin, DROP nom, DROP prenom, DROP email, DROP password, DROP image, CHANGE faculte_id faculte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE secretaire DROP cin, DROP nom, DROP prenom, DROP email, DROP password, DROP image, CHANGE faculte_id faculte_id INT DEFAULT NULL');
    }
}
