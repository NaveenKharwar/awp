const gruntConfig = function( grunt ) {
	grunt.initConfig( {
		pkg: grunt.file.readJSON( 'package.json' ),
		sass: {
			dev: {
				options: {
					sourcemap: 'file',
					style: 'expanded',
					loadPath: 'node_modules/bootstrap/scss',
				},
				files: {
					'assets/css/theme.css': 'resources/sass/theme.scss',
					'style.css': 'resources/sass/style.scss',
					'assets/css/fonts.css': 'resources/sass/fonts.scss',
					'assets/css/style-editor.css':
            'resources/sass/editor/style-editor.scss',
					'assets/css/customizer/range-control.css': 'resources/sass/customizer/range-control.scss',
				},
			},
			dist: {
				options: {
					style: 'compressed',
					loadPath: 'node_modules/bootstrap/scss',
				},
				files: {
					'assets/css/theme.css': 'resources/sass/theme.scss',
					'style.css': 'resources/sass/style.scss',
					'assets/css/fonts.css': 'resources/sass/fonts.scss',
					'assets/css/style-editor.css':
            'resources/sass/editor/style-editor.scss',
					'assets/css/customizer/range-control.css': 'resources/sass/customizer/range-control.scss',
				},
			},
		},
		cssmin: {
			build: {
				expand: true,
				src: [ 'assets/css/theme.css', 'assets/css/fonts.css' ],
				ext: '.min.css',
			},
		},
		copy: {
			font: {
				expand: true,
				flatten: true,
				src: [
					'resources/fonts/Mulish/**',
					'resources/fonts/IBMPlexSans/**',
				],
				dest: 'assets/fonts/',
				filter: 'isFile',
			},
			bootstrap_style: {
				expand: true,
				flatten: true,
				src: 'node_modules/bootstrap/scss/bootstrap.scss',
				dest: 'resources/sass/framework/',
				filter: 'isFile',
			},
			boxicons: {
				expand: true,
				// flatten: true,
				cwd: 'node_modules/boxicons/',
				src: [
					'**/css/*',
					'**/fonts/*',
				],
				dest: 'assets/boxicons/',
				// filter: 'isFile',
			},
			build: {
				src: [
					'**',
					'!node_modules/**',
					'!vendor/**',
					'!Gruntfile.js',
					'!package.json',
					'!package-lock.json',
					'!resources/**',
					'!composer.json',
					'!composer.lock',
					'!phpcs.xml.dist',
					'!README.md',
					'!CHANGELOG.md',
					'!style.css.map',
					'!assets/**/**.css.map',
					'!wpcs',
					// "!theme.css.map",
					// "!style-editor.css.map",
					'!woocommerce.css.map',
				],
				dest: 'build/',
			},
		},
		uglify: {
			theme_js: {
				files: {
					'assets/js/customizer.min.js': [ 'resources/js/customizer.js' ],
					'assets/js/script.min.js': 'resources/js/script.js',
					'assets/js/range-control.min.js': 'resources/js/range-control.js',
				},
			},
		},
		compress: {
			build: {
				options: {
					archive: '<%= pkg.name %>-<%= pkg.version %>.zip',
				},
				files: [
					{
						expand: true,
						cwd: 'build/',
						src: [ '**/*' ],
					},
				],
			},
		},
		clean: {
			dist: {
				src: [ 'build', '**/**.zip' ],
			},
		},
		version: {
			stylesheet: {
				options: {
					prefix: 'Version\\:\\s+',
				},
				src: 'style.css',
			},
			functions: {
				options: {
					prefix: "AGILITYWP_VERSION', '",
				},
				src: 'functions.php',
			},
		},
		watch: {
			css: {
				files: '**/*.scss',
				// tasks: [ 'sass:dev', 'cssmin', 'uglify', 'copy', 'version' ],
				tasks: [ 'sass:dev' ],
				options: {
					spawn: false,
				},
			},
		},
	} );
	grunt.loadNpmTasks( 'grunt-contrib-sass' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
	grunt.loadNpmTasks( 'grunt-contrib-copy' );
	grunt.loadNpmTasks( 'grunt-contrib-compress' );
	grunt.loadNpmTasks( 'grunt-contrib-clean' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-version' );
	// Watch Task
	grunt.registerTask( 'default', [ 'watch' ] );
	// build task
	grunt.registerTask( 'build', [ 'sass:dist', 'cssmin', 'uglify', 'copy', 'version' ] );
	// Release Task
	grunt.registerTask( 'prod', [ 'sass:dist', 'cssmin', 'uglify', 'version', 'copy', 'compress' ] );
};

module.exports = gruntConfig;
