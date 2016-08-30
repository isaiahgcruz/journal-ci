var gulp = require('gulp'), 
    concat = require('gulp-concat'), 
    notify = require('gulp-notify');

gulp.task('default', function() {
  // place code for your default task here
});

gulp.task('watch', function () {
    gulp.watch('assets/css/*.css', ['css']);	
    gulp.watch('assets/js/*.js', ['js']);  
});

gulp.task('js', function() {
	return gulp.src('assets/js/*.js')
        .pipe(concat('app.js'))
        .pipe(gulp.dest('assets/build/'))
        .pipe(notify('JS Compiled'));
})

gulp.task('css', function() {
	return gulp.src('assets/css/*.css')
    	.pipe(concat('app.css'))
        .pipe(gulp.dest('assets/build/'))
        .pipe(notify('CSS Compiled'));
});