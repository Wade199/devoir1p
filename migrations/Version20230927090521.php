<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927090521 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
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
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_603499938CB8A8D2');
        $this->addSql('DROP INDEX IDX_603499938CB8A8D2 ON contrat');
        $this->addSql('ALTER TABLE contrat DROP modele_batterie_id');
        $this->addSql('ALTER TABLE usager DROP FOREIGN KEY FK_3CDC65FF4F36F0FC');
        $this->addSql('DROP INDEX IDX_3CDC65FF4F36F0FC ON usager');
        $this->addSql('ALTER TABLE usager DROP usager_id');
    }
}
