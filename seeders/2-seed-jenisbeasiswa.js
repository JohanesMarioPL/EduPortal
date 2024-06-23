'use strict';

module.exports = {
    up: async (queryInterface, Sequelize) => {
        return queryInterface.bulkInsert('jenis_beasiswa', [
            {
                jenis_beasiswa_id: 1,
                nama_jenis_beasiswa: 'Beasiswa Anak Pegawai',
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                jenis_beasiswa_id: 2,
                nama_jenis_beasiswa: 'Beasiswa Prestasi Akademik',
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                jenis_beasiswa_id: 3,
                nama_jenis_beasiswa: 'Beasiswa Prestasi Non-Akademik',
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                jenis_beasiswa_id: 4,
                nama_jenis_beasiswa: 'Beasiswa Ekonomi Lemah',
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                jenis_beasiswa_id: 5,
                nama_jenis_beasiswa: 'Beasiswa Gereja',
                created_at: new Date(),
                updated_at: new Date()
            },
            {
                jenis_beasiswa_id: 6,
                nama_jenis_beasiswa: 'Beasiswa Badan Pendukung',
                created_at: new Date(),
                updated_at: new Date()
            }
        ], {});
    },

    down: async (queryInterface, Sequelize) => {
        return queryInterface.bulkDelete('jenis_beasiswa', null, {});
    }
};
