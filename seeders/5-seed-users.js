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
                nrp: '0002',
                username: 'fakultaskedokteran',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 2, // Default role
                nama: 'Fakultas Kedokteran',
                email: 'kedokteran@university.com',
                fakultas_id: 1, // ID fakultas Kedokteran
                program_studi_id: null,
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '0003',
                username: 'fakultaskedokterangigi',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 2, // Default role
                nama: 'Fakultas Kedokteran Gigi',
                email: 'kedokterangigi@university.com',
                fakultas_id: 2, // ID fakultas Kedokteran Gigi
                program_studi_id: null,
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '0004',
                username: 'fakultaspsikologi',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 2, // Default role
                nama: 'Fakultas Psikologi',
                email: 'psikologi@university.com',
                fakultas_id: 3, // ID fakultas Psikologi
                program_studi_id: null,
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '0005',
                username: 'fakultashumaniora',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 2, // Default role
                nama: 'Fakultas Humaniora dan Industri Kreatif',
                email: 'humaniora@university.com',
                fakultas_id: 4, // ID fakultas Humaniora dan Industri Kreatif
                program_studi_id: null,
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '0006',
                username: 'fakultashukum',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 2, // Default role
                nama: 'Fakultas Hukum dan Bisnis Digital',
                email: 'hukum@university.com',
                fakultas_id: 5, // ID fakultas Hukum dan Bisnis Digital
                program_studi_id: null,
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '0007',
                username: 'fakultasteknologi',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 2, // Default role
                nama: 'Fakultas Teknologi dan Rekayasa Cerdas',
                email: 'teknologi@university.com',
                fakultas_id: 6, // ID fakultas Teknologi dan Rekayasa Cerdas
                program_studi_id: null,
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '0008',
                username: 'pendidikandokter',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 3, // Program Studi role
                nama: 'S-1 Pendidikan Dokter',
                email: 'pendidikandokter@university.com',
                fakultas_id: 1, // ID fakultas Kedokteran
                program_studi_id: 1, // ID program studi Pendidikan Dokter
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '0009',
                username: 'pendidikankedokterangigi',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 3, // Program Studi role
                nama: 'S-1 Pendidikan Kedokteran Gigi',
                email: 'pendidikankedokterangigi@university.com',
                fakultas_id: 2, // ID fakultas Kedokteran Gigi
                program_studi_id: 2, // ID program studi Pendidikan Kedokteran Gigi
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '0010',
                username: 'psikologi',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 3, // Program Studi role
                nama: 'S-1 Psikologi',
                email: 'psikologi@university.com',
                fakultas_id: 3, // ID fakultas Psikologi
                program_studi_id: 3, // ID program studi Psikologi
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '0011',
                username: 'sastrainggris',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 3, // Program Studi role
                nama: 'S-1 Sastra Inggris',
                email: 'sastrainggris@university.com',
                fakultas_id: 4, // ID fakultas Humaniora dan Industri Kreatif
                program_studi_id: 4, // ID program studi Sastra Inggris
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '0012',
                username: 'sastrajepang',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 3, // Program Studi role
                nama: 'S-1 Sastra Jepang',
                email: 'sastrajepang@university.com',
                fakultas_id: 4, // ID fakultas Humaniora dan Industri Kreatif
                program_studi_id: 5, // ID program studi Sastra Jepang
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '2272019',
                username: 'dummyuser1',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 4, // Custom role
                nama: 'Dummy User 1',
                email: 'dummyuser1@university.com',
                fakultas_id: 1, // ID fakultas Kedokteran
                program_studi_id: 1, // ID program studi Pendidikan Dokter
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '2272020',
                username: 'dummyuser2',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 4, // Custom role
                nama: 'Dummy User 2',
                email: 'dummyuser2@university.com',
                fakultas_id: 2, // ID fakultas Kedokteran Gigi
                program_studi_id: 2, // ID program studi Pendidikan Kedokteran Gigi
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '2272021',
                username: 'dummyuser3',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 4, // Custom role
                nama: 'Dummy User 3',
                email: 'dummyuser3@university.com',
                fakultas_id: 3, // ID fakultas Psikologi
                program_studi_id: 3, // ID program studi Psikologi
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '2272022',
                username: 'dummyuser4',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 4, // Custom role
                nama: 'Dummy User 4',
                email: 'dummyuser4@university.com',
                fakultas_id: 4, // ID fakultas Humaniora dan Industri Kreatif
                program_studi_id: 4, // ID program studi Sastra Inggris
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                nrp: '2272023',
                username: 'dummyuser5',
                password: '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', // Hashed password for 'admin'
                role_id: 4, // Custom role
                nama: 'Dummy User 5',
                email: 'dummyuser5@university.com',
                fakultas_id: 4, // ID fakultas Humaniora dan Industri Kreatif
                program_studi_id: 5, // ID program studi Sastra Jepang
                created_at: new Date(),
                updated_at: new Date()
            }
        ], {});
    },

    down: async (queryInterface, Sequelize) => {
        return queryInterface.bulkDelete('users', null, {});
    }
};
