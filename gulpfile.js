// Initialization
var gulp        = require('gulp');
var $           = require('gulp-load-plugins')();
var del         = require('del');
var browserSync = require('browser-sync');
var reload      = browserSync.reload;

// task: js
gulp.task('js', function() {
  gulp.src('./bower_components/jquery-placeholder/jquery.placeholder.js')
    .pipe($.rename('jquery.placeholder.min.js'))
    .pipe($.uglify())
    .pipe(gulp.dest('js'));

  gulp.src('./js/bootstrap.js')
    .pipe($.rename('bootstrap.min.js'))
    .pipe($.uglify())
    .pipe(gulp.dest('js'));
});

// task: browserSync
gulp.task('browserSync', function() {
  browserSync({
    sever: {
      baseDir: './',
      proxy: 'local.yii-englishwordbook-demo:8080'
    }
  });
});

// task: clean
gulp.task('clean', del.bind(null, [
  'bower_components',
  'node_modules',
  'js/bootstrap',
  'js/bootstrap.js',
  'js/bootstrap-sprockets.js',
  'protected/sass/.sass-cache'
]));

// task: default
gulp.task('default', ['browserSync'], function() {
  gulp.watch('./protected/{views,widgets}/**/*.php', reload);
  gulp.watch('./**/css/*.css', reload);
});
