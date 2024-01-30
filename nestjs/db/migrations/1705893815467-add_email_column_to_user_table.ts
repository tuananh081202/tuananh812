import { MigrationInterface, QueryRunner } from "typeorm";

export class AddEmailColumnToUserTable1705893815467 implements MigrationInterface {
    name = 'AddEmailColumnToUserTable1705893815467'

    public async up(queryRunner: QueryRunner): Promise<void> {
        await queryRunner.query(`ALTER TABLE \`user\` ADD \`email\` varchar(255) NOT NULL`);
    }

    public async down(queryRunner: QueryRunner): Promise<void> {
        await queryRunner.query(`ALTER TABLE \`user\` DROP COLUMN \`email\``);
    }

}
