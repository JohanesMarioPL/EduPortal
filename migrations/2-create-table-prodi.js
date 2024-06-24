'use strict';

module.exports = {
    up: async (queryInterface, Sequelize) => {
        await queryInterface.createTable('program_studi', {
            program_studi_id: {
                allowNull: false,
                autoIncrement: true,
                primaryKey: true,
                type: Sequelize.INTEGER
            },
            nama_program_studi: {
                type: Sequelize.STRING(100),
                allowNull: false
            },
            fakultas_id: {
                type: Sequelize.INTEGER,
                allowNull: false,
                references: {
                    model: 'fakultas',
                    key: 'fakultas_id'
                },
                onDelete: 'CASCADE'
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
        await queryInterface.dropTable('program_studi');
    }
};
