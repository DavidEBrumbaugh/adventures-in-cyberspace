module.exports = {
	dist: {
		options: {
			processors: [
				require('autoprefixer')({browsers: 'last 2 versions'})
			]
		},
		files: { 
			'assets/css/adventures-in-cyberspace.css': [ 'assets/css/adventures-in-cyberspace.css' ]
		}
	}
};