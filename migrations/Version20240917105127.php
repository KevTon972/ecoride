<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240917105127 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE covoiturage (id INT AUTO_INCREMENT NOT NULL, voiture_id INT NOT NULL, date_depart DATETIME NOT NULL, heure_depart DATETIME NOT NULL, lieu_depart VARCHAR(255) NOT NULL, date_arrivee DATETIME NOT NULL, heure_arrivee DATETIME NOT NULL, lieu_arrivee VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, nombre_place INT NOT NULL, prix_personne NUMERIC(5, 2) NOT NULL, duree_trajet VARCHAR(255) NOT NULL COMMENT \'(DC2Type:dateinterval)\', INDEX IDX_28C79E89181A8BA (voiture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE covoiturage_utilisateur (covoiturage_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_96E46B0D62671590 (covoiturage_id), INDEX IDX_96E46B0DFB88E14F (utilisateur_id), PRIMARY KEY(covoiturage_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE covoiturage ADD CONSTRAINT FK_28C79E89181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id)');
        $this->addSql('ALTER TABLE covoiturage_utilisateur ADD CONSTRAINT FK_96E46B0D62671590 FOREIGN KEY (covoiturage_id) REFERENCES covoiturage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE covoiturage_utilisateur ADD CONSTRAINT FK_96E46B0DFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE covoiturage DROP FOREIGN KEY FK_28C79E89181A8BA');
        $this->addSql('ALTER TABLE covoiturage_utilisateur DROP FOREIGN KEY FK_96E46B0D62671590');
        $this->addSql('ALTER TABLE covoiturage_utilisateur DROP FOREIGN KEY FK_96E46B0DFB88E14F');
        $this->addSql('DROP TABLE covoiturage');
        $this->addSql('DROP TABLE covoiturage_utilisateur');
    }
}
