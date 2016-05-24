module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    concat: {
      options: {
        separator: ';'
      },
      dist: {
        src: ['templates/js/*.js'],
        dest: 'compiled-dev/js'
      }
    },

    // minify JS
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
      },
      dist: {
        files: {
          'compiled-dev/js/<%= pkg.name %>.min.js': ['templates/js/*.js']
        }
      }
    },

    // run tests
    qunit: {
      files: ['test/**/*.html']
    },

    sass: {    
      dist: {  
        options: {    
          style: 'expanded'
        },
        files: {                      
          'compiled-dev/css/intro.css': 'templates/styles/sass/intro.scss'      // 'destination': 'source'
        }
      }
    },

    jshint: {
      files: ['Gruntfile.js', 'templates/js/*.js', 'test/**/*.js'],
      options: {
        // options here to override JSHint defaults
        globals: {
          jQuery: true,
          console: true,
          module: true,
          document: true
        }
      }
    },

    watch: {
      files: ['templates/styles/sass/intro.scss'],
      tasks: ['sass'],
      options: {
        event: ['added', 'deleted'],
        reload: true
      }
    }
  });

  // install dependencies
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-qunit');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-sass');

  grunt.registerTask('test', ['jshint', 'qunit']);

  // Grunt task cmds
  grunt.registerTask('default', ['jshint', 'sass'/*'qunit', 'concat', 'uglify'*/]);

};