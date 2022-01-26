<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124132711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE intervenant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, metier VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, devis_id INT NOT NULL, creation DATETIME NOT NULL, stripe_session_id VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B1DC7A1E41DEFADA (devis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1E41DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A541DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE demande_service ADD CONSTRAINT FK_D16A217D80E95E18 FOREIGN KEY (demande_id) REFERENCES demande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande_service ADD CONSTRAINT FK_D16A217DED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE devis_intervenant ADD CONSTRAINT FK_DDB1DF5D41DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE devis_intervenant ADD CONSTRAINT FK_DDB1DF5DAB9A1716 FOREIGN KEY (intervenant_id) REFERENCES intervenant (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devis_intervenant DROP FOREIGN KEY FK_DDB1DF5DAB9A1716');
        $this->addSql('ALTER TABLE demande_service DROP FOREIGN KEY FK_D16A217DED5CA9E6');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A5A76ED395');
        $this->addSql('DROP TABLE intervenant');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A541DEFADA');
        $this->addSql('ALTER TABLE demande_service DROP FOREIGN KEY FK_D16A217D80E95E18');
        $this->addSql('ALTER TABLE devis_intervenant DROP FOREIGN KEY FK_DDB1DF5D41DEFADA');
    }
}
