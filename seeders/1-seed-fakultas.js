'use strict';

module.exports = {
    up: async (queryInterface, Sequelize) => {
        return queryInterface.bulkInsert('fakultas', [
            {
                fakultas_id: 1,
                nama_fakultas: 'Fakultas Kedokteran',
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                fakultas_id: 2,
                nama_fakultas: 'Fakultas Kedokteran Gigi',
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                fakultas_id: 3,
                nama_fakultas: 'Fakultas Psikologi',
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                fakultas_id: 4,
                nama_fakultas: 'Fakultas Humaniora dan Industri Kreatif',
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                fakultas_id: 5,
                nama_fakultas: 'Fakultas Hukum dan Bisnis Digital',
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                fakultas_id: 6,
                nama_fakultas: 'Fakultas Teknologi dan Rekayasa Cerdas',
                created_at: new Date(),
                updated_at: new Date()
            }
        ], {});
    },

    down: async (queryInterface, Sequelize) => {
        return queryInterface.bulkDelete('fakultas', null, {});
    }
};
