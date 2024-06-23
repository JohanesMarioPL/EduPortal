'use strict';

module.exports = {
    up: async (queryInterface, Sequelize) => {
        return queryInterface.bulkInsert('role', [
            {
                role_id: 1,
                nama_role: 'Administrator',
            },
            {
                role_id: 2,
                nama_role: 'Fakultas',
            },
            {
                role_id: 3,
                nama_role: 'Program Studi',
            },
            {
                role_id: 4,
                nama_role: 'Mahasiswa',
            }
        ], {});
    },

    down: async (queryInterface, Sequelize) => {
        return queryInterface.bulkDelete('role', null, {});
    }
};
