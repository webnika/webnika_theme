module.exports = function(grunt) {

	grunt.initConfig({

		// Kompilace SCSS do CSS
		sass: {
			dist: {
				files: {
					'./assets/grunt/style.css': './assets/stylesheets/style.scss'
				}
			}
		},

		// Spojení javascriptu
		concat: {
			js: {
				src: './assets/js/*.js',
				dest: './assets/grunt/main.js'
			}
		},

		// Minifakce javascriptu a css
		uglify: {
			js: {
				files: {
					'./js/main.min.js': ['./assets/grunt/main.js']
				}
			}
		},

	    // Minifikace 
	    cssmin: {
		  target: {
		    files: {
		      './style.min.css': ['./assets/grunt/style.css']
		    }
		  }
		},

		// Stalker v akci
		watch: {
			js: {
				files: ['./assets/js/*.js'],
				tasks: ['concat:js', 'uglify:js'],
				options: {
					spawn: false,
					livereload: true
				}
			},
			css: {
				files: ['./assets/stylesheets/**/*.scss'],
				tasks: ['sass','cssmin'],
				options: {
					spawn: false,
					livereload: true
				}
			}
		},

	});

	// Naloaduj tasky
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-watch');


	// Registruj spouštějící úlohy pro terminál - pro defaultní stačí volat "grunt"
	grunt.registerTask('default', [ 'sass','concat','uglify','cssmin','watch' ]);


};