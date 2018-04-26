<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180426161656 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_794381C66C8A81A9');
        $this->addSql('CREATE TEMPORARY TABLE __temp__review AS SELECT id, products_id, summary, is_public FROM review');
        $this->addSql('DROP TABLE review');
        $this->addSql('CREATE TABLE review (id INTEGER NOT NULL, products_array_id INTEGER DEFAULT NULL, summary VARCHAR(255) NOT NULL COLLATE BINARY, if_public BOOLEAN NOT NULL, comment_author VARCHAR(255) NOT NULL, review_date VARCHAR(255) NOT NULL, product_price INTEGER NOT NULL, retailers_list VARCHAR(255) NOT NULL, review_score INTEGER NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_794381C67A1AAFFE FOREIGN KEY (products_array_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO review (id, products_array_id, summary, if_public) SELECT id, products_id, summary, is_public FROM __temp__review');
        $this->addSql('DROP TABLE __temp__review');
        $this->addSql('CREATE INDEX IDX_794381C67A1AAFFE ON review (products_array_id)');
        $this->addSql('DROP INDEX UNIQ_C2502824F85E0677');
        $this->addSql('CREATE TEMPORARY TABLE __temp__app_users AS SELECT id, username, password, roles FROM app_users');
        $this->addSql('DROP TABLE app_users');
        $this->addSql('CREATE TABLE app_users (user_id INTEGER NOT NULL, username VARCHAR(25) NOT NULL COLLATE BINARY, password VARCHAR(64) NOT NULL COLLATE BINARY, roles CLOB NOT NULL COLLATE BINARY --(DC2Type:json_array)
        , PRIMARY KEY(user_id))');
        $this->addSql('INSERT INTO app_users (user_id, username, password, roles) SELECT id, username, password, roles FROM __temp__app_users');
        $this->addSql('DROP TABLE __temp__app_users');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C2502824F85E0677 ON app_users (username)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX UNIQ_C2502824F85E0677');
        $this->addSql('CREATE TEMPORARY TABLE __temp__app_users AS SELECT user_id, username, password, roles FROM app_users');
        $this->addSql('DROP TABLE app_users');
        $this->addSql('CREATE TABLE app_users (id INTEGER NOT NULL, username VARCHAR(25) NOT NULL, password VARCHAR(64) NOT NULL, roles CLOB NOT NULL --(DC2Type:json_array)
        , PRIMARY KEY(id))');
        $this->addSql('INSERT INTO app_users (id, username, password, roles) SELECT user_id, username, password, roles FROM __temp__app_users');
        $this->addSql('DROP TABLE __temp__app_users');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C2502824F85E0677 ON app_users (username)');
        $this->addSql('DROP INDEX IDX_794381C67A1AAFFE');
        $this->addSql('CREATE TEMPORARY TABLE __temp__review AS SELECT id, products_array_id, summary, if_public FROM review');
        $this->addSql('DROP TABLE review');
        $this->addSql('CREATE TABLE review (id INTEGER NOT NULL, summary VARCHAR(255) NOT NULL, products_id INTEGER DEFAULT NULL, is_public BOOLEAN NOT NULL, author VARCHAR(255) NOT NULL COLLATE BINARY, date VARCHAR(255) NOT NULL COLLATE BINARY, retailers VARCHAR(255) NOT NULL COLLATE BINARY, price INTEGER NOT NULL, score INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO review (id, products_id, summary, is_public) SELECT id, products_array_id, summary, if_public FROM __temp__review');
        $this->addSql('DROP TABLE __temp__review');
        $this->addSql('CREATE INDEX IDX_794381C66C8A81A9 ON review (products_id)');
    }
}
