'use strict';

module.exports = {
    up: async (queryInterface, Sequelize) => {
        await queryInterface.createTable('users', {
            nrp: {
                type: Sequelize.STRING,
                allowNull: false,
                primaryKey: true
            },
            username: {
                type: Sequelize.STRING(50),
                allowNull: false
            },
            password: {
                type: Sequelize.STRING,
                allowNull: false
            },
            role_id: {
                type: Sequelize.INTEGER,
                allowNull: false,
                references: {
                    model: 'role',
                    key: 'role_id'
                },
                onDelete: 'CASCADE'
            },
            nama: {
                type: Sequelize.STRING(100),
                allowNull: true
            },
            email: {
                type: Sequelize.STRING(100),
                allowNull: true
            },
            fakultas_id: {
                type: Sequelize.INTEGER,
                allowNull: true,
                references: {
                    model: 'fakultas',
                    key: 'fakultas_id'
                },
                onDelete: 'SET NULL'
            },
            program_studi_id: {
                type: Sequelize.INTEGER,
                allowNull: true,
                references: {
                    model: 'program_studi',
                    key: 'program_studi_id'
                },
                onDelete: 'SET NULL'
            },
            created_at: {
                allowNull: false,
                type: Sequelize.DATE,
                defaultValue: Sequelize.literal('CURRENT_TIMESTAMP')
            },
            updated_at: {
                allowNull: false,
                type: Sequelize.DATE,
                defaultValue: Sequelize.literal('CURRENT_TIMESTAMP')
            }
        });
    },

    down: async (queryInterface, Sequelize) => {
        await queryInterface.dropTable('users');
    }
};
