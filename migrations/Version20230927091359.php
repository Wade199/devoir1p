<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927091359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE borne (id INT AUTO_INCREMENT NOT NULL, date_mise_en_service DATETIME NOT NULL, date_derniere_revision DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operation_rechargement (id INT AUTO_INCREMENT NOT NULL, date_heure_début DATETIME NOT NULL, date_heure_fin DATETIME NOT NULL, nb_kw_heures INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station (id INT AUTO_INCREMENT NOT NULL, latitude VARCHAR(255) NOT NULL, longitude VARCHAR(255) NOT NULL, adresserue VARCHAR(255) NOT NULL, adresse_ville VARCHAR(255) NOT NULL, code_postal DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE supporter (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_charge (id INT AUTO_INCREMENT NOT NULL, libelle_type_charge VARCHAR(255) NOT NULL, puissance_type_charge VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrat ADD modele_batterie_id INT NOT NULL');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_603499938CB8A8D2 FOREIGN KEY (modele_batterie_id) REFERENCES modele_batterie (id)');
        $this->addSql('CREATE INDEX IDX_603499938CB8A8D2 ON contrat (modele_batterie_id)');
        $this->addSql('ALTER TABLE usager ADD usager_id INT NOT NULL');
        $this->addSql('ALTER TABLE usager ADD CONSTRAINT FK_3CDC65FF4F36F0FC FOREIGN KEY (usager_id) REFERENCES contrat (id)');
        $this->addSql('CREATE INDEX IDX_3CDC65FF4F36F0FC ON usager (usager_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE borne');
        $this->addSql('DROP TABLE operation_rechargement');
        $this->addSql('DROP TABLE station');
        $this->addSql('DROP TABLE supporter');
        $this->addSql('DROP TABLE type_charge');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_603499938CB8A8D2');
        $this->addSql('DROP INDEX IDX_603499938CB8A8D2 ON contrat');
        $this->addSql('ALTER TABLE contrat DROP modele_batterie_id');
        $this->addSql('ALTER TABLE usager DROP FOREIGN KEY FK_3CDC65FF4F36F0FC');
        $this->addSql('DROP INDEX IDX_3CDC65FF4F36F0FC ON usager');
        $this->addSql('ALTER TABLE usager DROP usager_id');
    }
}
