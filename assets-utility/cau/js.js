'use strict';

const gulp = require('gulp');
const config = require('./config');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const obfuscator = require('gulp-javascript-obfuscator');
const path = require('path');
const babel = require('gulp-babel');
const sourcemaps = require("gulp-sourcemaps");

module.exports = {
	dev: function(done) {
    // return gulp.src( path.join(__dirname, '../../', config.get('source.js.src')) + '/**/*.js' )
    //   .pipe(sourcemaps.init())
    //   .pipe(babel({
    //     "presets": [["es2015", { "modules": false }]]
    //   }))
    //   //.pipe(concat(config.get('source.js.cocat_to')))
    //   .pipe(sourcemaps.write('./maps'))
    //   .pipe( gulp.dest( path.join(__dirname, '../../', config.get('source.js.dest')) ))
		return gulp.src( path.join(__dirname, '../../', config.get('source.js.src')) + '/**/*.js' )
			.pipe( gulp.dest( path.join(__dirname, '../../', config.get('source.js.dest')) ))
	},
	dist: function(done){
		return gulp.src( path.join(__dirname, '../../', config.get('source.js.src')) + '/**/*.js' )
			.pipe(concat(config.get('source.js.cocat_to')))
			.pipe(uglify())
			//.pipe(obfuscator())
      .pipe(gulp.dest( path.join(__dirname, '../../', config.get('source.js.dest')) ));

      // //.pipe(sourcemaps.init())
      // .pipe(babel({
      //   presets: ['@babel/env']
      // }))
      // .pipe(concat(config.get('source.js.cocat_to')))
      // //.pipe(sourcemaps.write())
      // .pipe( gulp.dest( path.join(__dirname, '../../', config.get('source.js.dest')) ))
	}
}
