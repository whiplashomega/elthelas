//Gulp Dependencies
const gulp = require('gulp');
const rename = require('gulp-rename');

//Style dependencies
const sass = require('gulp-sass');
const minifyCss = require('gulp-minify-css');

//Development dependencies
const jshint = require('gulp-jshint');
const stylish = require('jshint-stylish');

//Test Dependencies
const mochaPhantomjs = require('gulp-mocha-phantomjs');

gulp.task('sass', (done) => {
  gulp.src('./src/AppBundle/sass/{,*/}*.scss')
    .pipe(sass())
    .pipe(gulp.dest('./src/AppBundle/css/'))
    .pipe(minifyCss({
      keepSpecialComments: 0
    }))
    .pipe(rename({ extname: '.min.css'}))
    .pipe(gulp.dest('./src/AppBundle/css/'))
    .on('end', done);
});

gulp.task('jshint-main', () => {
  var stream = gulp.src('./src/AppBundle/js/{,*/}*.js')
    .pipe(jshint())
    .pipe(jshint.reporter(stylish))
    .pipe(jshint.reporter('fail'));
  return stream;
});

gulp.task('jshint-test', () => {
  var stream = gulp.src('./tests/js/{,*/}*.js')
    .pipe(jshint())
    .pipe(jshint.reporter(stylish))
    .pipe(jshint.reporter('fail'));
  return stream;
});

gulp.task('default', ['e2e', 'jshint']);