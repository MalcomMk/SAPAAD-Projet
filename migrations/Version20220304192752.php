<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220304192752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande_service (demande_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_D16A217D80E95E18 (demande_id), INDEX IDX_D16A217DED5CA9E6 (service_id), PRIMARY KEY(demande_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demande_service ADD CONSTRAINT FK_D16A217D80E95E18 FOREIGN KEY (demande_id) REFERENCES demande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande_service ADD CONSTRAINT FK_D16A217DED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A519EB6921');
        $this->addSql('DROP INDEX IDX_2694D7A519EB6921 ON demande');
        $this->addSql('ALTER TABLE demande CHANGE heure heure INT NOT NULL, CHANGE client_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_2694D7A5A76ED395 ON demande (user_id)');
        $this->addSql('ALTER TABLE devis CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD280E95E18');
        $this->addSql('DROP INDEX IDX_E19D9AD280E95E18 ON service');
        $this->addSql('ALTER TABLE service DROP demande_id');
        $this->addSql('ALTER TABLE user DROP service');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE demande_service');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A5A76ED395');
        $this->addSql('DROP INDEX IDX_2694D7A5A76ED395 ON demande');
        $this->addSql('ALTER TABLE demande CHANGE heure heure TIME NOT NULL, CHANGE user_id client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A519EB6921 FOREIGN KEY (client_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_2694D7A519EB6921 ON demande (client_id)');
        $this->addSql('ALTER TABLE devis CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE service ADD demande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD280E95E18 FOREIGN KEY (demande_id) REFERENCES demande (id)');
        $this->addSql('CREATE INDEX IDX_E19D9AD280E95E18 ON service (demande_id)');
        $this->addSql('ALTER TABLE `user` ADD service VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
