/*
 * grunt
 * http://gruntjs.com/
 *
 * Copyright (c) 2013 "Cowboy" Ben Alman
 * Licensed under the MIT license.
 * https://github.com/gruntjs/grunt/blob/master/LICENSE-MIT
 */

'use strict';

/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    banner: '/** \n' +
      ' * <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
      '<%= grunt.template.today("yyyy-mm-dd") %> \n' +
      ' * web: <%= pkg.homepage %> \n' +
      ' * Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
      ' Licensed <%= _.pluck(pkg.licenses, "type").join(", ") %> \n */\n',
    footer: '\n',

    // Setup Uglify
    //    To run sepatate files, list files as shown below (https://github.com/gruntjs/grunt-contrib-uglify/issues/23)
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
        '<%= grunt.template.today("yyyy-mm-dd") %> */',
        mangle: false
      },
      dist: {
        files: {
          'js/main.min.js': ['js/main.js'],
          'js/plugins.min.js': ['js/plugins.js']
        }
      }
    },

    // Setup jshint to behave
    jshint: {
      files: ['gruntfile.js', 'js/main.js'],
      options: {
        "curly": true,
        "eqeqeq": true,
        "immed": true,
        "latedef": true,
        "newcap": true,
        "noarg": true,
        "sub": true,
        // "undef": true,
        "unused": true,
        "boss": true,
        "eqnull": true,
        "node": true,
        globals: {
          jQuery: true,
        }
      }
    },

    // Setup Watch
    //    Lists of files & tasks as seen below
    watch: {
      gruntfile: {
        files: '<%= jshint.gruntfile.src %>',
        tasks: ['jshint:gruntfile']
      },
      compass: {
        files: '**/*.scss',
        tasks: ['compass:dist']
      },
      uglify: {
        files: ['js/main.js', 'js/plugins.js'],
        tasks: ['uglify']
      }
    },

    // Setup Compass/Sass to load from existing config.rb
    //    Seems that sassDir & cssDir still needs to be defined regardless. Just copied from config.rb
    compass: {
      dist: {
        options: {
          sassDir: 'sass/',
          cssDir: '.',
          imagesDir: 'img/',
          config: 'src/config.rb'
        }
      }
    }

    // Setup ImageMin
    // imagemin: {
    //   dist: {
    //     files: {
    //       'img-optim/*.png': 'img/*.png',
    //       'img-optim/*.jpg': 'img/*.jpg'
    //     }
    //   }
    // }
  });

  // Load required tasks
  grunt.loadNpmTasks('grunt-contrib-compass');
  // grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-jshint');

  // Set Default Tasks
  // $ Grunt
  // Test/Minify JS and Compile Sass
  grunt.registerTask('default', [
    'jshint',
    'compass',
    // 'imagemin',
    'uglify',
    'watch'
  ]);
};