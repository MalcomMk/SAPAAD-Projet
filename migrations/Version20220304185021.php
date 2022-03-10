<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220304185021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE demande_service');
        $this->addSql('ALTER TABLE service ADD demande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD280E95E18 FOREIGN KEY (demande_id) REFERENCES demande (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD280E95E18 ON service (demande_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande_service (demande_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_D16A217D80E95E18 (demande_id), INDEX IDX_D16A217DED5CA9E6 (service_id), PRIMARY KEY(demande_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE demande_service ADD CONSTRAINT FK_D16A217DED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande_service ADD CONSTRAINT FK_D16A217D80E95E18 FOREIGN KEY (demande_id) REFERENCES demande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD280E95E18');
        $this->addSql('DROP INDEX IDX_E19D9AD280E95E18 ON service');
        $this->addSql('ALTER TABLE service DROP demande_id');
    }
}
