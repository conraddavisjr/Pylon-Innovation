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
      dist: {
        files: {   // 'destination': 'source'
          'compiled-dev/js/intro.min.js': ['templates/js/intro.js'],
          'compiled-dev/js/filter-nav.min.js': ['templates/js/filter-nav.js']
          // 'compiled-dev/js/item-zoom.min.js': ['templates/js/item-zoom.js']
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
        files: {   // 'destination': 'source'                   
          'compiled-dev/css/intro.css': 'templates/styles/sass/intro.scss',      
          'compiled-dev/css/base.css': 'templates/styles/sass/base.scss',
          'compiled-dev/css/events.css': 'templates/styles/sass/events.scss',
          'compiled-dev/css/news.css': 'templates/styles/sass/news.scss'
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
      files: ['templates/styles/**/*.scss', 'templates/**/*.js'],
      tasks: ['sass', 'uglify'],
      options: {
        event: ['added', 'deleted', 'changed']
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