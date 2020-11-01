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
  'color-palette/source/scripts.js',
  'color-palette/shortcode/source/cp-admin.js'
];

// JS build task.
gulp.task( 'js', () => {
  return browserify( { entries: jsFiles } )
    .transform( 'babelify', { presets: ['es2015', 'react'] } )
    .bundle()
    .pipe( source( 'color-palette.min.js' ) )
    .pipe( buffer() )
    .pipe( uglify() )
    .pipe( gulp.dest( 'color-palette/build' ) );
} );

// CSS front-end build task.
gulp.task( 'css-frontend', () => {
  return gulp.src( 'color-palette/source/styles-frontend.scss' )
    .pipe( sass().on( 'error', sass.logError ) )
    .pipe( clean() )
    .pipe( rename( {suffix: '.min'} ) )
    .pipe( gulp.dest( 'color-palette/build' ) );
} );

// CSS editor build task.
gulp.task( 'css-editor', () => {
  return gulp.src( 'color-palette/source/styles-editor.scss' )
    .pipe( sass().on( 'error', sass.logError ) )
    .pipe( clean() )
    .pipe( rename( {suffix: '.min'} ) )
    .pipe( gulp.dest( 'color-palette/build' ) );
} );

// Admin CSS build task.
gulp.task( 'admincss', () => {
  return gulp.src( 'color-palette/shortcode/source/cp-admin.scss' )
    .pipe( sass().on( 'error', sass.logError ) )
    .pipe( clean() )
    .pipe( rename( {suffix: '.min'} ) )
    .pipe( gulp.dest( 'color-palette/shortcode/build' ) );
} );

// Default task.
gulp.task( 'default', gulp.series( 'js', 'css-frontend', 'css-editor', 'admincss' ) );
