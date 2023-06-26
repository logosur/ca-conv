<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230621095739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE chat_preguntas_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE chat_session_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE chat_preguntas (id INT NOT NULL, chat_id INT NOT NULL, pregunta_id INT NOT NULL, respuesta_id INT DEFAULT NULL, fecha TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1E945A2E1A9A7125 ON chat_preguntas (chat_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1E945A2E31A5801E ON chat_preguntas (pregunta_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1E945A2ED9BA57A2 ON chat_preguntas (respuesta_id)');
        $this->addSql('CREATE TABLE chat_session (id INT NOT NULL, usuario_id INT DEFAULT NULL, uuid UUID NOT NULL, completado SMALLINT DEFAULT NULL, fecha_inicio TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, fecha_modificacion TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9C4A19BDDB38439E ON chat_session (usuario_id)');
        $this->addSql('COMMENT ON COLUMN chat_session.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE chat_preguntas ADD CONSTRAINT FK_1E945A2E1A9A7125 FOREIGN KEY (chat_id) REFERENCES chat_session (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE chat_preguntas ADD CONSTRAINT FK_1E945A2E31A5801E FOREIGN KEY (pregunta_id) REFERENCES pregunta (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE chat_preguntas ADD CONSTRAINT FK_1E945A2ED9BA57A2 FOREIGN KEY (respuesta_id) REFERENCES usuarios_respuesta (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE chat_session ADD CONSTRAINT FK_9C4A19BDDB38439E FOREIGN KEY (usuario_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE messenger_messages ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE messenger_messages ALTER available_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE messenger_messages ALTER delivered_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE chat_preguntas_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE chat_session_id_seq CASCADE');
        $this->addSql('ALTER TABLE chat_preguntas DROP CONSTRAINT FK_1E945A2E1A9A7125');
        $this->addSql('ALTER TABLE chat_preguntas DROP CONSTRAINT FK_1E945A2E31A5801E');
        $this->addSql('ALTER TABLE chat_preguntas DROP CONSTRAINT FK_1E945A2ED9BA57A2');
        $this->addSql('ALTER TABLE chat_session DROP CONSTRAINT FK_9C4A19BDDB38439E');
        $this->addSql('DROP TABLE chat_preguntas');
        $this->addSql('DROP TABLE chat_session');
        $this->addSql('ALTER TABLE messenger_messages ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE messenger_messages ALTER available_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE messenger_messages ALTER delivered_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS NULL');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS NULL');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS NULL');
    }
}
