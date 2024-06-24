'use strict';

module.exports = {
    up: async (queryInterface, Sequelize) => {
        await queryInterface.createTable('pengajuan_beasiswa', {
            pengajuan_id: {
                allowNull: false,
                autoIncrement: true,
                primaryKey: true,
                type: Sequelize.INTEGER
            },
            jenis_beasiswa_id: {
                type: Sequelize.INTEGER,
                allowNull: false,
                references: {
                    model: 'jenis_beasiswa',
                    key: 'jenis_beasiswa_id'
                },
                onDelete: 'CASCADE'

            },
            nrp: {
                type: Sequelize.STRING,
                allowNull: false,
                references: {
                    model: 'users',
                    key: 'nrp'
                },
                onDelete: 'CASCADE'

            },
            periode_id: {
                type: Sequelize.BIGINT,
                allowNull: false,
                references: {
                    model: 'periode_pengajuan',
                    key: 'periode_id'
                },
                onDelete: 'CASCADE'
            },
            tanggal_pengajuan: {
                type: Sequelize.DATEONLY,
                allowNull: false
            },
            status_pengajuan: {
                type: Sequelize.ENUM,
                values: ['diajukan', 'disetujui_program_studi', 'disetujui_fakultas', 'ditolak_program_studi', 'ditolak_fakultas'],
                allowNull: false
            },
            IPK: {
                type: Sequelize.FLOAT,
                allowNull: false
            },
            portofolio: {
                type: Sequelize.INTEGER,
                allowNull: false
            },
            dokumenPKM: {
                type: Sequelize.STRING,
                allowNull: false
            },
            dokumenTidakMenerimaBeasiswaLain: {
                type: Sequelize.STRING,
                allowNull: false
            },
            dokumenSertifikat: {
                type: Sequelize.STRING,
                allowNull: false
            },
            dokumenSKTM: {
                type: Sequelize.STRING,
                allowNull: false
            },
            dokumenTagihanListrik: {
                type: Sequelize.STRING,
                allowNull: false
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
        await queryInterface.dropTable('pengajuan_beasiswa');
    }
};
