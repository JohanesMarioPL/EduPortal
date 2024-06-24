'use strict';

module.exports = {
    up: async (queryInterface, Sequelize) => {
        return queryInterface.bulkInsert('users', [
            {
                nrp: '0001',
                username: 'admin',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 1, // Administrator role
                nama: 'Administrator',
                email: 'admin@admin.com',
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '72002',
                username: 'jhondoi',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'jhondoi'
                role_id: 3, // Program Studi role
                nama: 'Jhon Doi',
                email: 'jhondoi@maranatha.ac.id',
                fakultas_id: 6, // ID fakultas
                program_studi_id: 18, // ID program studi
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '72021',
                username: 'johndoe',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'johndoe'
                role_id: 1, // Administrator role
                nama: 'john doe',
                email: 'johndoe@gmail.com',
                fakultas_id: 1, // ID fakultas
                program_studi_id: 2, // ID program studi
                created_at: '2024-06-05 08:50:40',
                updated_at: '2024-06-05 08:50:40'
            }
        ], {});
    },

    down: async (queryInterface, Sequelize) => {
        return queryInterface.bulkDelete('users', null, {});
    }
};
