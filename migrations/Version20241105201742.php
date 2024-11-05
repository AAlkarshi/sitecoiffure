<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241105201742 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abonnement (id INT AUTO_INCREMENT NOT NULL, nom_abonnement VARCHAR(255) NOT NULL, tarifs_abonnement NUMERIC(4, 2) NOT NULL, choix_abonnement TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, id_coiffeur_id INT NOT NULL, nom_client VARCHAR(255) NOT NULL, prenom_client VARCHAR(255) NOT NULL, email_client VARCHAR(255) NOT NULL, avatar_client VARCHAR(255) DEFAULT NULL, date_naissance_client DATE NOT NULL, password_client VARCHAR(255) NOT NULL, INDEX IDX_C7440455A550B1A0 (id_coiffeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_abonnement (client_id INT NOT NULL, abonnement_id INT NOT NULL, INDEX IDX_A54655FA19EB6921 (client_id), INDEX IDX_A54655FAF1D74413 (abonnement_id), PRIMARY KEY(client_id, abonnement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coiffeur (id INT AUTO_INCREMENT NOT NULL, email_coiffeur VARCHAR(255) NOT NULL, roles JSON NOT NULL, avatar_coiffeur VARCHAR(255) DEFAULT NULL, nom_coiffeur VARCHAR(255) NOT NULL, prenom_coiffeur VARCHAR(255) NOT NULL, date_naissance_coiffeur DATE NOT NULL, password_coiffeur VARCHAR(255) NOT NULL, dispo_heure_travail DATETIME NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email_coiffeur), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coiffeur_service (coiffeur_id INT NOT NULL, service_id INT NOT NULL, INDEX IDX_BE37736FBD427C57 (coiffeur_id), INDEX IDX_BE37736FED5CA9E6 (service_id), PRIMARY KEY(coiffeur_id, service_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rendez_vous (id INT AUTO_INCREMENT NOT NULL, date_heure_rdv DATETIME NOT NULL, duree_rdv TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rendez_vous_client (rendez_vous_id INT NOT NULL, client_id INT NOT NULL, INDEX IDX_36DC053F91EF7EAA (rendez_vous_id), INDEX IDX_36DC053F19EB6921 (client_id), PRIMARY KEY(rendez_vous_id, client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rendez_vous_coiffeur (rendez_vous_id INT NOT NULL, coiffeur_id INT NOT NULL, INDEX IDX_2B36E6D691EF7EAA (rendez_vous_id), INDEX IDX_2B36E6D6BD427C57 (coiffeur_id), PRIMARY KEY(rendez_vous_id, coiffeur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, nom_service VARCHAR(255) NOT NULL, tarif_service NUMERIC(4, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_client (service_id INT NOT NULL, client_id INT NOT NULL, INDEX IDX_F9830163ED5CA9E6 (service_id), INDEX IDX_F983016319EB6921 (client_id), PRIMARY KEY(service_id, client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A550B1A0 FOREIGN KEY (id_coiffeur_id) REFERENCES coiffeur (id)');
        $this->addSql('ALTER TABLE client_abonnement ADD CONSTRAINT FK_A54655FA19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_abonnement ADD CONSTRAINT FK_A54655FAF1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coiffeur_service ADD CONSTRAINT FK_BE37736FBD427C57 FOREIGN KEY (coiffeur_id) REFERENCES coiffeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coiffeur_service ADD CONSTRAINT FK_BE37736FED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rendez_vous_client ADD CONSTRAINT FK_36DC053F91EF7EAA FOREIGN KEY (rendez_vous_id) REFERENCES rendez_vous (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rendez_vous_client ADD CONSTRAINT FK_36DC053F19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rendez_vous_coiffeur ADD CONSTRAINT FK_2B36E6D691EF7EAA FOREIGN KEY (rendez_vous_id) REFERENCES rendez_vous (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rendez_vous_coiffeur ADD CONSTRAINT FK_2B36E6D6BD427C57 FOREIGN KEY (coiffeur_id) REFERENCES coiffeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service_client ADD CONSTRAINT FK_F9830163ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service_client ADD CONSTRAINT FK_F983016319EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A550B1A0');
        $this->addSql('ALTER TABLE client_abonnement DROP FOREIGN KEY FK_A54655FA19EB6921');
        $this->addSql('ALTER TABLE client_abonnement DROP FOREIGN KEY FK_A54655FAF1D74413');
        $this->addSql('ALTER TABLE coiffeur_service DROP FOREIGN KEY FK_BE37736FBD427C57');
        $this->addSql('ALTER TABLE coiffeur_service DROP FOREIGN KEY FK_BE37736FED5CA9E6');
        $this->addSql('ALTER TABLE rendez_vous_client DROP FOREIGN KEY FK_36DC053F91EF7EAA');
        $this->addSql('ALTER TABLE rendez_vous_client DROP FOREIGN KEY FK_36DC053F19EB6921');
        $this->addSql('ALTER TABLE rendez_vous_coiffeur DROP FOREIGN KEY FK_2B36E6D691EF7EAA');
        $this->addSql('ALTER TABLE rendez_vous_coiffeur DROP FOREIGN KEY FK_2B36E6D6BD427C57');
        $this->addSql('ALTER TABLE service_client DROP FOREIGN KEY FK_F9830163ED5CA9E6');
        $this->addSql('ALTER TABLE service_client DROP FOREIGN KEY FK_F983016319EB6921');
        $this->addSql('DROP TABLE abonnement');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE client_abonnement');
        $this->addSql('DROP TABLE coiffeur');
        $this->addSql('DROP TABLE coiffeur_service');
        $this->addSql('DROP TABLE rendez_vous');
        $this->addSql('DROP TABLE rendez_vous_client');
        $this->addSql('DROP TABLE rendez_vous_coiffeur');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE service_client');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
