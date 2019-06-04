const gulp = require( 'gulp' ),
      babel = require( 'gulp-babel' )
      clean = require( 'gulp-clean-css' ),
      concat = require( 'gulp-concat' ),
      rename = require( 'gulp-rename' ),
      sass = require( 'gulp-sass' ),
      uglify = require( 'gulp-uglify' ),
      watch = require( 'gulp-watch' );

// Array of JS files, in order by dependency.
const jsFiles = [
  'shortcode/source/cp-admin.js'
];

// JS build task.
gulp.task( 'js', () => {
  return gulp.src( jsFiles )
    .pipe( babel( {
      presets: ['minify', 'es2015']
    } ) )
    .pipe( concat( 'cp-admin.min.js' ) )
    .pipe( gulp.dest( 'shortcode/build' ) );
} );

// CSS build task.
gulp.task( 'css', () => {
  return gulp.src( 'shortcode/source/cp-styles.scss' )
    .pipe( sass().on( 'error', sass.logError ) )
    .pipe( clean() )
    .pipe( rename( {suffix: '.min'} ) )
    .pipe( gulp.dest( 'shortcode/build' ) );
} );

// Admin CSS build task.
gulp.task( 'admincss', () => {
  return gulp.src( 'shortcode/source/cp-admin.scss' )
    .pipe( sass().on( 'error', sass.logError ) )
    .pipe( clean() )
    .pipe( rename( {suffix: '.min'} ) )
    .pipe( gulp.dest( 'shortcode/build' ) );
} );

// Default task.
gulp.task( 'default', gulp.series( 'js', 'css', 'admincss' ) );
