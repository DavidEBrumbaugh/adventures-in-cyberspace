module.exports = {
	main: {
		options: {
			mode: 'zip',
			archive: './release/advincs_.<%= pkg.version %>.zip'
		},
		expand: true,
		cwd: 'release/<%= pkg.version %>/',
		src: ['**/*'],
		dest: 'advincs_/'
	}
};