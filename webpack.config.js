const path = require('path');

module.exports = {
	mode: 'development',
	entry: './public/js/vietqr.mjs',
	output: {
		path: path.resolve(__dirname, './public/dist'),
		filename: 'bundle.js',
	},
};