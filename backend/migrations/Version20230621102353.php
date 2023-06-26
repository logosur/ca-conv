<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230621102353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recomendacion ADD chat_id INT NOT NULL');
        $this->addSql('ALTER TABLE recomendacion ADD CONSTRAINT FK_739444C11A9A7125 FOREIGN KEY (chat_id) REFERENCES chat_session (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_739444C11A9A7125 ON recomendacion (chat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE recomendacion DROP CONSTRAINT FK_739444C11A9A7125');
        $this->addSql('DROP INDEX UNIQ_739444C11A9A7125');
        $this->addSql('ALTER TABLE recomendacion DROP chat_id');
    }
}
