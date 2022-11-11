<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221111200541 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, country VARCHAR(50) NOT NULL, lat DOUBLE PRECISION NOT NULL, longt DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `lead` (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(50) DEFAULT NULL, last_name VARCHAR(50) DEFAULT NULL, company VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, img VARCHAR(50) DEFAULT NULL, street VARCHAR(50) DEFAULT NULL, id_state INT NOT NULL, city VARCHAR(50) DEFAULT NULL, id_country INT NOT NULL, postal_code VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE state (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, state VARCHAR(50) NOT NULL, INDEX IDX_A393D2FBF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, state_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, img VARCHAR(50) NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649F92F3E70 (country_id), INDEX IDX_8D93D6495D83CC1 (state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_lead (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_lead_user (user_lead_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_6C851E7758585B87 (user_lead_id), INDEX IDX_6C851E77A76ED395 (user_id), PRIMARY KEY(user_lead_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_lead_lead (user_lead_id INT NOT NULL, lead_id INT NOT NULL, INDEX IDX_C987A9F558585B87 (user_lead_id), INDEX IDX_C987A9F555458D (lead_id), PRIMARY KEY(user_lead_id, lead_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE state ADD CONSTRAINT FK_A393D2FBF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE user_lead_user ADD CONSTRAINT FK_6C851E7758585B87 FOREIGN KEY (user_lead_id) REFERENCES user_lead (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_lead_user ADD CONSTRAINT FK_6C851E77A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_lead_lead ADD CONSTRAINT FK_C987A9F558585B87 FOREIGN KEY (user_lead_id) REFERENCES user_lead (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_lead_lead ADD CONSTRAINT FK_C987A9F555458D FOREIGN KEY (lead_id) REFERENCES `lead` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE state DROP FOREIGN KEY FK_A393D2FBF92F3E70');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F92F3E70');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495D83CC1');
        $this->addSql('ALTER TABLE user_lead_user DROP FOREIGN KEY FK_6C851E7758585B87');
        $this->addSql('ALTER TABLE user_lead_user DROP FOREIGN KEY FK_6C851E77A76ED395');
        $this->addSql('ALTER TABLE user_lead_lead DROP FOREIGN KEY FK_C987A9F558585B87');
        $this->addSql('ALTER TABLE user_lead_lead DROP FOREIGN KEY FK_C987A9F555458D');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE `lead`');
        $this->addSql('DROP TABLE state');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_lead');
        $this->addSql('DROP TABLE user_lead_user');
        $this->addSql('DROP TABLE user_lead_lead');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
