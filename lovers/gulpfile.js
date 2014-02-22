// Include gulp
var gulp = require('gulp');

// Include Plugins
var jshint = require('gulp-jshint');
var compass = require('gulp-compass');
var minifyCSS = require('gulp-minify-css');
var imagemin = require('gulp-imagemin');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

var paths = {
    scripts: 'static/js/dev/*.js',
    styles: ['static/sass/*.scss', 'static/sass/**/*.scss'],
    images: 'static/img/assets/**/*'
};

// Lint Task
gulp.task('lint', function() {
    gulp.src(paths.scripts)
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Compile Sass with Compass
gulp.task('compass', function() {
    gulp.src(paths.styles)
        .pipe(compass({
            // config_file: './src/config.rb',
            css: 'static/css/',
            sass: 'static/sass/',
            image: 'static/img/'
        }))
        .pipe(minifyCSS())
        .pipe(gulp.dest('static/css/'));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    gulp.src(paths.scripts)
        .pipe(concat('main.js'))
        .pipe(gulp.dest('js/'))
        .pipe(rename('main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('static/js/'));
});

gulp.task('images', function() {
 return gulp.src(paths.images)
    // Pass in options to the task
    .pipe(imagemin({optimizationLevel: 5}))
    .pipe(gulp.dest('static/img/'));
});


// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch(paths.scripts, ['lint', 'scripts']);
    gulp.watch(paths.styles, ['compass']);
    gulp.watch(paths.images, ['images']);
});

// Default Task
gulp.task('default', ['images', 'lint', 'compass', 'scripts', 'watch']);