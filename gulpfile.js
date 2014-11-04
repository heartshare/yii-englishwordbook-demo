// Initialization
var browserSync     = require('browser-sync');
var del             = require('del');
var gulp            = require('gulp');
var $               = require('gulp-load-plugins')();
var mainBowerFiles  = require('main-bower-files');
var reload          = browserSync.reload;

// task: build
gulp.task('build', ['less'], function() {
  gulp.src(mainBowerFiles())
    .pipe(gulp.dest('js'));

  gulp.src('./bower_components/bootstrap/fonts/*')
    .pipe(gulp.dest('fonts'));
});

// task: less
gulp.task('less', function() {
  gulp.src('./protected/less/styles.less')
    .pipe($.less())
    .pipe($.autoprefixer('last 2 version', 'ie 8'))
    .pipe($.minifyCss({keepBreaks: true}))
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
