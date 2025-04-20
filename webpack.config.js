const path = require('path');
const defaultConfig = require('@wordpress/scripts/config/webpack.config');

module.exports = {
    ...defaultConfig,
    entry: {
        admin: [
            path.resolve(__dirname, 'assets/js/admin.js'),
            path.resolve(__dirname, 'assets/css/admin.css')
        ]
    },
    output: {
        path: path.resolve(__dirname, 'build'),
        filename: '[name].js'
    }
};