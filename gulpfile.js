//reference packages
var gulp        = require('gulp');
var jslint      = require('gulp-jslint');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');
var projectPHPWatchFiles = './**/*.php'; // Path to all PHP files.    
var reload = browserSync.reload; // For manual browser reload.

//create a task to convert sass into css
gulp.task('sass', function() {
    return gulp.src(['node_modules/bootstrap/scss/bootstrap.scss', 'scss/*.scss'])
        .pipe(sass())
        .pipe(gulp.dest("css"))
        .pipe(browserSync.stream());
});

// Move javascript files to src folder
gulp.task('js', function() {
    return gulp.src(
        ['node_modules/bootstrap/dist/js/bootstrap.min.js', 
        'node_modules/jquery/dist/jquery.js',
        'node_modules/jquery.steps/dist/jquery.steps.js',
        'node_modules/jquery-validation/dist/jquery.validate.js',
        'node_modules/tether/dist/js/tether.min.js'])
        .pipe(gulp.dest("js"))
        .pipe(browserSync.stream());
});
// Find issues with my code
gulp.task('jslint', function () {
    return gulp.src(['./js/script.js'])
            .pipe(jslint({
                predef: ['$', 'JQuery', 'document', 'window', 'console'], // Set global variables mostly for JQuery
                this: true, // Tolerate using this keyword
                browser: true // Assume "a browser" option true
            }))
            .pipe(jslint.reporter('default'));
});
// Watch for scss/html files/php files
// server
gulp.task('serve', ['sass'], function() {
    browserSync.init({
        // Use when running locally and using php.
        proxy: "http://localhost/SASS/dev/"
        
        // Use when running localhost no php for example.
        // server: "./"
    });
    gulp.watch(['node_modules/bootstrap/scss/bootstrap.scss', 'scss/*.scss'], ['sass']);
    gulp.watch("*.html").on('change', browserSync.reload);
    gulp.watch("./*.php").on('change', browserSync.reload);
    gulp.watch( projectPHPWatchFiles, reload); // Reload on PHP file changes.    
});
// Start server and launch browser
gulp.task('default', ['js','serve']);