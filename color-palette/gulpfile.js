const gulp = require( 'gulp' ),
      babel = require( 'gulp-babel' )
      browserify = require( 'browserify' ),
      buffer = require( 'vinyl-buffer' ),
      clean = require( 'gulp-clean-css' ),
      rename = require( 'gulp-rename' ),
      sass = require( 'gulp-sass' ),
      source = require( 'vinyl-source-stream' ),
      uglify = require( 'gulp-uglify' );

// Array of JS files, in order by dependency.
const jsFiles = [
  'source/block/color-palette/index.js',
  'shortcode/source/cp-admin.js'
];

// JS build task.
gulp.task( 'js', () => {
  return browserify( { entries: jsFiles } )
    .transform( 'babelify', { presets: ['es2015', 'react'] } )
    .bundle()
    .pipe( source( 'color-palette.min.js' ) )
    .pipe( buffer() )
    .pipe( uglify() )
    .pipe( gulp.dest( 'build' ) );
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
