var gulp = require('gulp');
var browserify = require('browserify');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');
var gutil = require('gulp-util');
var concat = require('gulp-concat');
var notify = require('gulp-notify');
var transform = require('vinyl-transform');
var sass = require('gulp-sass');

gulp.task('default', function() {
  // place code for your default task here
});

gulp.task('watch', function () {
    gulp.watch('assets/scss/app.scss', ['scss']);	
    gulp.watch(['assets/js/*.js', 'assets/js/**/*'], ['javascript']);  
    gulp.start(['scss', 'javascript']);
});

gulp.task('javascript', function () {
  // set up the browserify instance on a task basis
  var b = browserify({
    entries: 'assets/js/main.js',
    debug: true
  });

  return b.bundle()
    .pipe(source('assets/js/*.js'))
    .pipe(buffer())
    .pipe(sourcemaps.init({loadMaps: true}))
        // Add transformation tasks to the pipeline here.
        // .pipe(uglify())
        .on('error', gutil.log)
        .pipe(concat('app.js'))
        .pipe(notify('Javascript Compiled'))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('public/build/'));
});

gulp.task('scss', function() {
	return gulp.src('assets/scss/app.scss')
        .pipe(sass())
        .pipe(concat('app.scss'))
        .pipe(gulp.dest('public/build/'))
        .pipe(notify('SCSS Compiled'));
});