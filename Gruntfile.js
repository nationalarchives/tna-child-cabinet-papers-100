module.exports = function (grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        jasmine: {
            pivotal: {
                src: 'js/compiled/*.js',
                options: {
                    specs: 'js/spec/*Spec.js',
                    helpers: 'js/spec/*Helper.js'
                }
            }
        },
        sass: {
            options: {
                sourcemap: 'none'
            },
            dist: {
                files: {
                    'css/base-sass.css': 'css/sass/base-sass.scss'
                }
            }
        },
        cssmin: {
            options: {
                sourceMap: true
            },
            target: {
                files: {
                    'css/base-sass.css.min': ['css/base-sass.css']
                }
            }
        },
        watch: {
            scripts: {
                files: 'js/*.js',
                tasks: ['qunit', 'concat', 'uglify']
            },
            css: {
                files: 'css/sass/*.scss',
                tasks: ['sass', 'cssmin']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    // Load the plugins that provide the tasks.
    grunt.loadNpmTasks('grunt-contrib-jasmine');

    //Default tasks
    grunt.registerTask('default', ['sass', 'cssmin', 'watch']);


};