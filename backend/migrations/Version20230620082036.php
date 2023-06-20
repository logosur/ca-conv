<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230620082036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE nombre_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE pregunta_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE producto_financiero_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE recomendacion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tipos_producto_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE usuarios_respuesta_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE pregunta (id INT NOT NULL, titulo VARCHAR(255) NOT NULL, descripcion TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE producto_financiero (id INT NOT NULL, tipo_producto_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, tasa_interes NUMERIC(10, 2) NOT NULL, plazo INT NOT NULL, monto_max_inversion NUMERIC(10, 2) NOT NULL, requisitos_ingresos_minimos NUMERIC(10, 2) NOT NULL, garantias NUMERIC(10, 2) NOT NULL, costos_adicionales NUMERIC(10, 2) NOT NULL, beneficios_adicionales NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D804334D43614776 ON producto_financiero (tipo_producto_id)');
        $this->addSql('CREATE TABLE recomendacion (id INT NOT NULL, usuario_id INT NOT NULL, producto_id INT NOT NULL, fecha TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_739444C1DB38439E ON recomendacion (usuario_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_739444C17645698E ON recomendacion (producto_id)');
        $this->addSql('CREATE TABLE tipos_producto (id INT NOT NULL, tipo VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE usuarios_respuesta (id INT NOT NULL, usuario_id INT NOT NULL, pregunta_id INT NOT NULL, respuesta VARCHAR(512) NOT NULL, fecha TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5E443341DB38439E ON usuarios_respuesta (usuario_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5E44334131A5801E ON usuarios_respuesta (pregunta_id)');
        $this->addSql('ALTER TABLE producto_financiero ADD CONSTRAINT FK_D804334D43614776 FOREIGN KEY (tipo_producto_id) REFERENCES tipos_producto (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE recomendacion ADD CONSTRAINT FK_739444C1DB38439E FOREIGN KEY (usuario_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE recomendacion ADD CONSTRAINT FK_739444C17645698E FOREIGN KEY (producto_id) REFERENCES producto_financiero (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE usuarios_respuesta ADD CONSTRAINT FK_5E443341DB38439E FOREIGN KEY (usuario_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE usuarios_respuesta ADD CONSTRAINT FK_5E44334131A5801E FOREIGN KEY (pregunta_id) REFERENCES pregunta (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE nombre');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE pregunta_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE producto_financiero_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE recomendacion_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tipos_producto_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE usuarios_respuesta_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE nombre_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE nombre (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE producto_financiero DROP CONSTRAINT FK_D804334D43614776');
        $this->addSql('ALTER TABLE recomendacion DROP CONSTRAINT FK_739444C1DB38439E');
        $this->addSql('ALTER TABLE recomendacion DROP CONSTRAINT FK_739444C17645698E');
        $this->addSql('ALTER TABLE usuarios_respuesta DROP CONSTRAINT FK_5E443341DB38439E');
        $this->addSql('ALTER TABLE usuarios_respuesta DROP CONSTRAINT FK_5E44334131A5801E');
        $this->addSql('DROP TABLE pregunta');
        $this->addSql('DROP TABLE producto_financiero');
        $this->addSql('DROP TABLE recomendacion');
        $this->addSql('DROP TABLE tipos_producto');
        $this->addSql('DROP TABLE usuarios_respuesta');
    }
}
