<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220304180246 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE devis_service (devis_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_7373018E41DEFADA (devis_id), INDEX IDX_7373018EED5CA9E6 (service_id), PRIMARY KEY(devis_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE devis_service ADD CONSTRAINT FK_7373018E41DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE devis_service ADD CONSTRAINT FK_7373018EED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A541DEFADA');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A5A76ED395');
        $this->addSql('DROP INDEX IDX_2694D7A541DEFADA ON demande');
        $this->addSql('DROP INDEX IDX_2694D7A5A76ED395 ON demande');
        $this->addSql('ALTER TABLE demande ADD intervenant_id INT NOT NULL, ADD client_id INT DEFAULT NULL, ADD heure TIME NOT NULL, ADD details LONGTEXT DEFAULT NULL, ADD status TINYINT(1) NOT NULL, DROP user_id, DROP devis_id, DROP precisions, CHANGE creation date_demande DATETIME NOT NULL');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5AB9A1716 FOREIGN KEY (intervenant_id) REFERENCES intervenant (id)');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A519EB6921 FOREIGN KEY (client_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_2694D7A5AB9A1716 ON demande (intervenant_id)');
        $this->addSql('CREATE INDEX IDX_2694D7A519EB6921 ON demande (client_id)');
        $this->addSql('ALTER TABLE devis ADD user_id INT NOT NULL, ADD heure TIME NOT NULL, ADD details LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52BA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_8B27C52BA76ED395 ON devis (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE devis_service');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A5AB9A1716');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A519EB6921');
        $this->addSql('DROP INDEX IDX_2694D7A5AB9A1716 ON demande');
        $this->addSql('DROP INDEX IDX_2694D7A519EB6921 ON demande');
        $this->addSql('ALTER TABLE demande ADD devis_id INT NOT NULL, ADD precisions VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP client_id, DROP heure, DROP details, DROP status, CHANGE intervenant_id user_id INT NOT NULL, CHANGE date_demande creation DATETIME NOT NULL');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A541DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_2694D7A541DEFADA ON demande (devis_id)');
        $this->addSql('CREATE INDEX IDX_2694D7A5A76ED395 ON demande (user_id)');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52BA76ED395');
        $this->addSql('DROP INDEX IDX_8B27C52BA76ED395 ON devis');
        $this->addSql('ALTER TABLE devis DROP user_id, DROP heure, DROP details');
    }
}
