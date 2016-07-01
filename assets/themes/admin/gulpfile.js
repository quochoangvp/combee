var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    browserSync = require('browser-sync').create();

var DEST = 'assets/';

gulp.task('scripts', function() {
    return gulp.src('src/js/**/*.js')
      .pipe(gulp.dest(DEST+'/js'));
});

gulp.task('sass', function() {
  return sass('src/scss/**/*.scss')
        .pipe(gulp.dest(DEST+'/css'))
        .pipe(browserSync.stream());
});

gulp.task('sass-minify', function() {
  return sass('src/scss/**/*.scss', {style: 'compressed'})
        .pipe(gulp.dest(DEST+'/css'))
        .pipe(browserSync.stream());
});

gulp.task('images', function() {
  return gulp.src(['src/images/**/*'])
        .pipe(gulp.dest(DEST+'/images'))
        .pipe(browserSync.stream());
});

gulp.task('watch', function() {
  // Watch .js files
  gulp.watch('src/js/*.js', ['scripts'], browserSync.reload);
  // Watch .scss files
  gulp.watch('src/scss/**/*.scss', ['sass'], browserSync.reload);
  // Watch image files
  gulp.watch('src/images/**/*', ['images'], browserSync.reload);
});

// Default Task
gulp.task('default', ['sass', 'scripts', 'images', 'watch']);