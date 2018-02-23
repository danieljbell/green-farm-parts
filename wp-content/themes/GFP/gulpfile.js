const gulp          = require('gulp'),
      postcss       = require('gulp-postcss'),
      sass          = require('gulp-sass'),
      sourcemaps    = require('gulp-sourcemaps'),
      atImport      = require('postcss-import'),
      autoprefixer  = require('autoprefixer'),
      mqpacker      = require('css-mqpacker'),
      cssnano       = require('cssnano'),
      concat        = require('gulp-concat'),
      uglify        = require('gulp-uglify'),
      pump          = require('pump'),
      browserSync   = require('browser-sync');


gulp.task('css', () => {
    const processors = [
        atImport,
        autoprefixer({browsers: ['last 6 versions', 'ie 9', 'ie 10', 'ie 11']}),
        mqpacker,
        cssnano
    ];
    gulp.src('./src/scss/style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss(processors))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./dist/css'))
        .pipe(browserSync.stream());
});


gulp.task('img', function() {
  gulp.src('./src/img/*')
      .pipe(gulp.dest('./dist/img'))
});


gulp.task('watch', function() {
  gulp.watch('src/scss/**/*.scss', ['css']);
  gulp.watch('src/img/*.{png,jpg,gif,svg}', ['img']).on('change', browserSync.reload);
  gulp.watch(['*.php', 'page-templates/*.php',  'partials/**/*.php']).on('change', browserSync.reload);
});

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "localhost:8888"
    });
});

gulp.task('default', ['css', 'img', 'watch', 'browser-sync']);