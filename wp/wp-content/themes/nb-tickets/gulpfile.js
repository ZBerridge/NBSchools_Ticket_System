'use strict'

var gulp = require('gulp')
var run = require('gulp-run')
var dart = require('gulp-dart-sass')
var sourcemaps = require('gulp-sourcemaps')

gulp.task('dartsass', function () {
  return gulp.src('./frontend/src/styles/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(dart({outputStyle: 'compressed'}).on('error', dart.logError))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./frontend/dist/css'))
})

gulp.task('dartsass-admin', function () {
  return gulp.src('./frontend/src/admin_styles/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(dart({outputStyle: 'compressed'}).on('error', dart.logError))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./frontend/admin/css'))
})

gulp.task('scripts', function(){
    return run('npm run build').exec();
})

gulp.task('watch', function () {
  gulp.watch('./frontend/src/styles/**/*.scss', gulp.series('dartsass'))
  gulp.watch('./frontend/src/admin_styles/**/*.scss', gulp.series('dartsass-admin'))
  gulp.watch('./frontend/src/scripts/**/*.js', gulp.series('scripts'))
  gulp.watch('./frontend/src/scripts/**/*.vue', gulp.series('scripts'))
})