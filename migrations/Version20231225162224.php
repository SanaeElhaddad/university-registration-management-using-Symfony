<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231225162224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE third_step ADD third_s_id INT NOT NULL');
        $this->addSql('ALTER TABLE third_step ADD CONSTRAINT FK_41B20CC866C12BC FOREIGN KEY (third_s_id) REFERENCES etudiant (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_41B20CC866C12BC ON third_step (third_s_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE third_step DROP FOREIGN KEY FK_41B20CC866C12BC');
        $this->addSql('DROP INDEX UNIQ_41B20CC866C12BC ON third_step');
        $this->addSql('ALTER TABLE third_step DROP third_s_id');
    }
}
