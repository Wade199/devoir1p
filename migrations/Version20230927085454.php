<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927085454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, usager_id INT NOT NULL, date_contrat DATETIME NOT NULL, no_immartriculation VARCHAR(100) NOT NULL, INDEX IDX_603499934F36F0FC (usager_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele_batterie (id INT AUTO_INCREMENT NOT NULL, capacité VARCHAR(255) NOT NULL, fabricant VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usager (id INT AUTO_INCREMENT NOT NULL, usager_id INT NOT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, adresse VARCHAR(100) NOT NULL, ville VARCHAR(30) NOT NULL, code_postal DOUBLE PRECISION NOT NULL, tel_fixe VARCHAR(100) NOT NULL, tel_mobile VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, INDEX IDX_3CDC65FF4F36F0FC (usager_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_603499934F36F0FC FOREIGN KEY (usager_id) REFERENCES usager (id)');
        $this->addSql('ALTER TABLE usager ADD CONSTRAINT FK_3CDC65FF4F36F0FC FOREIGN KEY (usager_id) REFERENCES contrat (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_603499934F36F0FC');
        $this->addSql('ALTER TABLE usager DROP FOREIGN KEY FK_3CDC65FF4F36F0FC');
        $this->addSql('DROP TABLE contrat');
        $this->addSql('DROP TABLE modele_batterie');
        $this->addSql('DROP TABLE usager');
        $this->addSql('DROP TABLE user');
    }
}
