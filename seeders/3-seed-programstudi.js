'use strict';

/** @type {import('sequelize-cli').Migration} */
module.exports = {
    up: async (queryInterface, Sequelize) => {
        return queryInterface.bulkInsert('program_studi', [
            { program_studi_id: 1, nama_program_studi: 'S-1 Pendidikan Dokter', fakultas_id: 1, created_at: null, updated_at: null },
            { program_studi_id: 2, nama_program_studi: 'S-1 Pendidikan Kedokteran Gigi', fakultas_id: 2, created_at: null, updated_at: null },
            { program_studi_id: 3, nama_program_studi: 'S-1 Psikologi', fakultas_id: 3, created_at: null, updated_at: null },
            { program_studi_id: 4, nama_program_studi: 'S-1 Sastra Inggris', fakultas_id: 4, created_at: null, updated_at: null },
            { program_studi_id: 5, nama_program_studi: 'S-1 Sastra Jepang', fakultas_id: 4, created_at: null, updated_at: null },
            { program_studi_id: 6, nama_program_studi: 'S-1 Sastra China', fakultas_id: 4, created_at: null, updated_at: null },
            { program_studi_id: 7, nama_program_studi: 'S-1 Seni Rupa Murni', fakultas_id: 4, created_at: null, updated_at: null },
            { program_studi_id: 8, nama_program_studi: 'S-1 Desain Interior', fakultas_id: 4, created_at: null, updated_at: null },
            { program_studi_id: 9, nama_program_studi: 'S-1 Desain Komunikasi Visual', fakultas_id: 4, created_at: null, updated_at: null },
            { program_studi_id: 10, nama_program_studi: 'S-1 Arsitektur', fakultas_id: 4, created_at: null, updated_at: null },
            { program_studi_id: 11, nama_program_studi: 'S-1 Manajemen', fakultas_id: 5, created_at: null, updated_at: null },
            { program_studi_id: 12, nama_program_studi: 'S-1 Akuntansi', fakultas_id: 5, created_at: null, updated_at: null },
            { program_studi_id: 13, nama_program_studi: 'S-1 Hukum', fakultas_id: 5, created_at: null, updated_at: null },
            { program_studi_id: 14, nama_program_studi: 'S-1 Teknik Sipil', fakultas_id: 6, created_at: null, updated_at: null },
            { program_studi_id: 15, nama_program_studi: 'S-1 Teknik Elektro', fakultas_id: 6, created_at: null, updated_at: null },
            { program_studi_id: 16, nama_program_studi: 'S-1 Teknik Industri', fakultas_id: 6, created_at: null, updated_at: null },
            { program_studi_id: 17, nama_program_studi: 'S-1 Sistem Komputer', fakultas_id: 6, created_at: null, updated_at: null },
            { program_studi_id: 18, nama_program_studi: 'S-1 Teknik Informatika', fakultas_id: 6, created_at: null, updated_at: null },
            { program_studi_id: 19, nama_program_studi: 'S-1 Sistem Informasi', fakultas_id: 6, created_at: null, updated_at: null },
        ], {});
    },

    down: async (queryInterface, Sequelize) => {
        return queryInterface.bulkDelete('program_studi', null, {});
    }
};
