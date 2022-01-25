const gulp       = require( 'gulp' ),
      browserify = require( 'browserify' ),
      buffer     = require( 'vinyl-buffer' ),
      clean      = require( 'gulp-clean-css' ),
      rename     = require( 'gulp-rename' ),
      sass       = require( 'gulp-sass' ),
      source     = require( 'vinyl-source-stream' ),
      uglify     = require( 'gulp-uglify' );


/**
 * Javascript build task.
 */

function jsTask() {
  return browserify( { entries: [ 'color-palette/source/scripts.js' ] } )
    .transform( 'babelify', { presets: [ '@babel/preset-env', '@babel/preset-react' ] } )
    .bundle()
    .pipe( source( 'color-palette.min.js' ) )
    .pipe( buffer() )
    .pipe( uglify() )
    .pipe( gulp.dest( 'color-palette/build' ) );
}


/**
 * CSS build tasks.
 */

// Front-end.
function cssFrontendTask() {
  return gulp.src( 'color-palette/source/styles-frontend.scss' )
    .pipe( sass().on( 'error', sass.logError ) )
    .pipe( clean() )
    .pipe( rename( {suffix: '.min'} ) )
    .pipe( gulp.dest( 'color-palette/build' ) );
}

// Editor.
function cssEditorTask() {
  return gulp.src( 'color-palette/source/styles-editor.scss' )
    .pipe( sass().on( 'error', sass.logError ) )
    .pipe( clean() )
    .pipe( rename( {suffix: '.min'} ) )
    .pipe( gulp.dest( 'color-palette/build' ) );
}


/**
 * Task definitions.
 */

gulp.task( 'default', gulp.series( jsTask, cssFrontendTask, cssEditorTask ) );
gulp.task( 'js', jsTask );
gulp.task( 'css', gulp.series( cssFrontendTask, cssEditorTask ) );
