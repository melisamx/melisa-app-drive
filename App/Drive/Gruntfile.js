module.exports = function(grunt) {
    
    grunt.initConfig({
        pkg: {
            appName: 'Drive',
            src: 'resources/assets/',
            output: '../../public/<%= pkg.appName.toLowerCase() %>/',
            proyect: {
                name: 'Melisa Drive',
                version: '1.0.0',
                company: 'Melisa Company'
            }
        },
        less: {
            options: {
                compress: true
            },
            all: {
                files: {
                    '<%= pkg.output %>css/browser-view.css': '<%= pkg.src %>less/browser-view.less',
                    '<%= pkg.output %>css/phone-browser-view.css': '<%= pkg.src %>less/phone-browser-view.less'
                }
            }
        },
        watch: {
            files: ['<%= pkg.src %>less/**/*.less'],
            tasks: ['less']
        }
    });
    
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('default', [
        'watch'
    ]);
    
};
