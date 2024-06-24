'use strict';

module.exports = {
    up: async (queryInterface, Sequelize) => {
        await queryInterface.createTable('periode_pengajuan', {
            periode_id: {
                allowNull: false,
                autoIncrement: true,
                primaryKey: true,
                type: Sequelize.BIGINT
            },
            nama_periode: {
                type: Sequelize.STRING(100),
                allowNull: false
            },
            tanggal_mulai: {
                type: Sequelize.DATEONLY,
                allowNull: false
            },
            tanggal_berakhir: {
                type: Sequelize.DATEONLY,
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
        await queryInterface.dropTable('periode_pengajuan');
    }
};
