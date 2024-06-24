const { Sequelize } = require('sequelize');

// Inisialisasi Sequelize
const sequelize = new Sequelize('eduportal', 'root', '', {
    host: 'localhost',
    dialect: 'mysql',
});

// Mengecek koneksi
sequelize.authenticate()
    .then(() => {
        console.log('Koneksi berhasil.');
    })
    .catch(err => {
        console.error('Tidak dapat terhubung ke database:', err);
    });

module.exports = sequelize;
