var gulp = require('gulp'), 
    concat = require('gulp-concat'), 
    notify = require('gulp-notify');

gulp.task('default', function() {
  // place code for your default task here
});

gulp.task('watch', function () {
    gulp.watch('assets/css/*.css', ['css']);	
    gulp.watch('assets/js/*.js', ['js']);  
    gulp.start(['css', 'js']);
});

gulp.task('js', function() {
	return gulp.src('assets/js/jquery-3.1.0.slim.min.js')
        .pipe(gulp.src('assets/js/!(jquery-3.1.0.slim.min)*.js'))
        .pipe(concat('app.js'))
        .pipe(gulp.dest('public/build/'))
        .pipe(notify('JS Compiled'));
})

gulp.task('css', function() {
	return gulp.src('assets/css/*.css')
    	.pipe(concat('app.css'))
        .pipe(gulp.dest('public/build/'))
        .pipe(notify('CSS Compiled'));
});