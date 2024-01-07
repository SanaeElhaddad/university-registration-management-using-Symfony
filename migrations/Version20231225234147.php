<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231225234147 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE third_step');
        $this->addSql('ALTER TABLE etudiant ADD niveau VARCHAR(255) NOT NULL, ADD note_math VARCHAR(255) NOT NULL, ADD note_franc VARCHAR(255) NOT NULL, ADD note_6eme VARCHAR(255) NOT NULL, ADD note_bac VARCHAR(255) NOT NULL, ADD attestation_reussite VARCHAR(255) NOT NULL, ADD carte_nationale VARCHAR(255) NOT NULL, ADD attestation_reussite1 VARCHAR(255) DEFAULT NULL, ADD attestation_reussite2 VARCHAR(255) DEFAULT NULL, ADD licence VARCHAR(255) DEFAULT NULL, ADD attestation_reussite4 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE third_step (id INT AUTO_INCREMENT NOT NULL, note_bac VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, attestation_reussite VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, carte_nationale VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, note_6eme VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, third_s_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE etudiant DROP niveau, DROP note_math, DROP note_franc, DROP note_6eme, DROP note_bac, DROP attestation_reussite, DROP carte_nationale, DROP attestation_reussite1, DROP attestation_reussite2, DROP licence, DROP attestation_reussite4');
    }
}
