<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230306142935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ingredient_season (ingredient_id INT NOT NULL, season_id INT NOT NULL, INDEX IDX_1C9E9BE8933FE08C (ingredient_id), INDEX IDX_1C9E9BE84EC001D1 (season_id), PRIMARY KEY(ingredient_id, season_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, start_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ingredient_season ADD CONSTRAINT FK_1C9E9BE8933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ingredient_season ADD CONSTRAINT FK_1C9E9BE84EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ingredient_season DROP FOREIGN KEY FK_1C9E9BE8933FE08C');
        $this->addSql('ALTER TABLE ingredient_season DROP FOREIGN KEY FK_1C9E9BE84EC001D1');
        $this->addSql('DROP TABLE ingredient_season');
        $this->addSql('DROP TABLE season');
    }
}
