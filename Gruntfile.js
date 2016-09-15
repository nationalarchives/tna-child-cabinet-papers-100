module.exports = function (grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            options: {
                sourcemap: 'none'
            },
            dist: {
                files: {
                    'css/cabinet-papers-100.css': 'css/sass/cabinet-papers-100.scss',
                    'css/documents.css': 'css/sass/documents.scss'
                }
            }
        },
        cssmin: {
            options: {
                sourceMap: true
            },
            target: {
                files: {
                    'css/cabinet-papers-100.css.min': ['css/cabinet-papers-100.css'],
                    'css/documents.css.min': ['css/documents.css']
                }
            }
        },
        watch: {
            scripts: {
                files: 'js/*.js',
                tasks: ['qunit', 'concat']
            },
            css: {
                files: 'css/sass/*.scss',
                tasks: ['sass', 'cssmin']
            }
        },
        concat: {
            options: {
                separator: ';'
            },
            dist: {
                src: ['js/mitigate-target-blank.js', 'js/run-on-page-load.js'],
                dest: 'js/compiled/tna-base.js'
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-concat');

    // Default task(s).
    grunt.registerTask('default', ['sass', 'cssmin', 'concat', 'watch']);
};