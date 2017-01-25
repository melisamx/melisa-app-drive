module.exports = function(grunt) {
    
    grunt.initConfig({
        main: {
            appName: 'Drive',
            src: 'resources/assets/',
            output: '../../public/<%= main.appName.toLowerCase() %>/',
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
//                    '<%= main.output %>css/app.css': '<%= main.src %>less/app.less'
                }
            }
        },
        watch: {
            files: ['<%= main.src %>less/**/*.less'],
            tasks: ['less']
        }
    });
    
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('default', [
        'watch'
    ]);
    
};
