//reference packages
var gulp        = require('gulp');
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
// Watch for scss/html/php files
//server - Change proxy below to needed path
gulp.task('serve', ['sass'], function() {
    browserSync.init({
        proxy: "http://localhost/SASS/dev/"
    });
    gulp.watch(['node_modules/bootstrap/scss/bootstrap.scss', 'scss/*.scss'], ['sass']);
    gulp.watch("*.html").on('change', browserSync.reload);
    gulp.watch("./*.php").on('change', browserSync.reload);
    gulp.watch( projectPHPWatchFiles, reload); // Reload on PHP file changes.
    
});






/* gulp.task('serve', ['sass'], function() {

    browserSync.init({
        server: "./"  
    });

    gulp.watch(['node_modules/bootstrap/scss/bootstrap.scss', 'scss/*.scss'], ['sass']);
}); */

// Start server and launch browser
gulp.task('default', ['js','serve']);