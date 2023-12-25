<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231225201208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etudiant_step3 (id INT AUTO_INCREMENT NOT NULL, e_step3_id INT NOT NULL, note_6eme VARCHAR(255) NOT NULL, note_bac VARCHAR(255) NOT NULL, attestation_reussite VARCHAR(255) NOT NULL, carte_nationale VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3DC467FE99227EE5 (e_step3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etudiant_step3 ADD CONSTRAINT FK_3DC467FE99227EE5 FOREIGN KEY (e_step3_id) REFERENCES etudiant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant_step3 DROP FOREIGN KEY FK_3DC467FE99227EE5');
        $this->addSql('DROP TABLE etudiant_step3');
    }
}
