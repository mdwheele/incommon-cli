// Pull in dependencies
var gulp = require('gulp');
var notify = require('gulp-notify');
var exec = require('child_process').exec;
var sys = require('sys');

// Paths used for watch.
var paths = {
    php: ['app/**/*.php']
};

// Run all PHPUnit tests
gulp.task('phpunit', function() {
    exec('clear; phpunit --coverage-text', function(error, stdout) {
        sys.puts(stdout);
    });
});

// Keep an eye on PHP files for changes...
gulp.task('watch', function () {
    gulp.watch(paths.php, ['phpunit']);
});

// What tasks does running gulp trigger?
gulp.task('default', ['phpunit', 'watch']);