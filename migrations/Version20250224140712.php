<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250224140712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, date_creation DATETIME NOT NULL, status VARCHAR(20) NOT NULL, delivery_address VARCHAR(255) NOT NULL, phone VARCHAR(15) NOT NULL, payment_method VARCHAR(50) NOT NULL, total_price DOUBLE PRECISION NOT NULL, INDEX IDX_6EEAA67DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conseil (id_c INT AUTO_INCREMENT NOT NULL, id_demande INT DEFAULT NULL, contenu VARCHAR(255) NOT NULL, date_conseil DATETIME NOT NULL, INDEX IDX_3F3F0681F8097ED5 (id_demande), PRIMARY KEY(id_c)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, specialite VARCHAR(255) NOT NULL, date_inscription DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, commande_id INT NOT NULL, date_livraison DATETIME NOT NULL, statut VARCHAR(20) NOT NULL, livreur VARCHAR(255) NOT NULL, livreur_phone VARCHAR(15) NOT NULL, tracking_number VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_A60C9F1F3E1C9C18 (tracking_number), UNIQUE INDEX UNIQ_A60C9F1F82EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE conseil ADD CONSTRAINT FK_3F3F0681F8097ED5 FOREIGN KEY (id_demande) REFERENCES demande (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA76ED395');
        $this->addSql('ALTER TABLE conseil DROP FOREIGN KEY FK_3F3F0681F8097ED5');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F82EA2E54');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE conseil');
        $this->addSql('DROP TABLE demande');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
