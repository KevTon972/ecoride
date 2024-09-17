<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240917102709 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_utilisateur (role_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_2F4B3B3AD60322AC (role_id), INDEX IDX_2F4B3B3AFB88E14F (utilisateur_id), PRIMARY KEY(role_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE role_utilisateur ADD CONSTRAINT FK_2F4B3B3AD60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role_utilisateur ADD CONSTRAINT FK_2F4B3B3AFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF03256915B');
        $this->addSql('DROP INDEX IDX_8F91ABF03256915B ON avis');
        $this->addSql('ALTER TABLE avis CHANGE relation_id utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF0FB88E14F ON avis (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role_utilisateur DROP FOREIGN KEY FK_2F4B3B3AD60322AC');
        $this->addSql('ALTER TABLE role_utilisateur DROP FOREIGN KEY FK_2F4B3B3AFB88E14F');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE role_utilisateur');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0FB88E14F');
        $this->addSql('DROP INDEX IDX_8F91ABF0FB88E14F ON avis');
        $this->addSql('ALTER TABLE avis CHANGE utilisateur_id relation_id INT NOT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF03256915B FOREIGN KEY (relation_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF03256915B ON avis (relation_id)');
    }
}
