"use strict";

const gulp = require('gulp'),
	  	babel = require('gulp-babel'),
	  	concat = require('gulp-concat'),
	  	sourcemaps = require('gulp-sourcemaps'),
	  	sass = require('gulp-sass');

gulp.task('babel-js', () => {
	return gulp.src('scripts/*.js')
		.pipe(sourcemaps.init())
		.pipe(babel({
			presets: ['es2015']
		}))
		.pipe(concat('app.js'))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest('www/dist'));
});

gulp.task('styles', () => {
	gulp.src('stylesheets/**/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass().on('error', sass.logError))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('www/css/'));
});

gulp.task('watch', () => {
	gulp.watch('scripts/app.js', ['babel-js']);
	gulp.watch('stylesheets/**/*.scss', ['styles']);
});

gulp.task('default', ['babel-js', 'styles', 'watch']);
