// Initialization
var gulp        = require('gulp');
var $           = require('gulp-load-plugins')();
var del         = require('del');
var browserSync = require('browser-sync');
var reload      = browserSync.reload;

// task: init
gulp.task('init', function() {
  gulp.src('./bower_components/jquery-placeholder/jquery.placeholder.js')
    .pipe($.rename('jquery.placeholder.min.js'))
    .pipe($.uglify({preserveComments: 'some'}))
    .pipe(gulp.dest('js'));

  gulp.src('./bower_components/bootstrap/dist/js/bootstrap.min.js')
    .pipe(gulp.dest('js'));

  gulp.src('./bower_components/bootstrap/fonts/*')
    .pipe(gulp.dest('fonts/bootstrap'));
});

// task: less
gulp.task('less', function() {
  gulp.src('./protected/less/styles.less')
    .pipe($.less())
    .pipe($.autoprefixer('last 2 version', 'ie 8'))
    .pipe($.minifyCss())
    .pipe(gulp.dest('./css'))
    .pipe(reload({stream: true, once: true}));
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
  'node_modules'
]));

// task: default
gulp.task('default', ['browserSync'], function() {
  gulp.watch('./protected/less/*.less', ['less']);
  gulp.watch('./protected/{views,widgets}/**/*.php', reload);
  gulp.watch('./**/css/*.css', reload);
});
