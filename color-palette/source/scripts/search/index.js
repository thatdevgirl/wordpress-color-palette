/**
 * Search functionality for the color palette block.
 *
 * This keyword search form will search by color name within a given
 * color palette block. It will display only those colors that match the
 * keyword and hide the rest from view.
 */

const ColorSearch = ( ($) => {

  $( document ).ready( () => {

    $( '.cp-palette-search-submit' ).click( (e) => { search(e); } );


    const search = ( e ) => {
      e.preventDefault();

      // Get the parent block, so that we know which color palette we are
      // working with (in case there are multiple on the page).
      const parent = $( e.target ).closest( '.cp-palette' );

      // Get the search keyword from the form.
      const keyword = $( '.cp-palette-search-input', parent ).val();

      // Get all of the child color blocks in this parent.
      const children = $( '.cp-color', parent );

      // If there is no keyword, show everything!
      if ( !keyword ) {
        $( children ).show();
        return false;
      }

      // If we are still there, there are child blocks to filter! Go through
      // each child block. If the keyword exists in the color name, show that
      // color; otherwise hide it.
      for ( let i=0; i<children.length; i++ ) {
        const colorName = $( '.cp-color-name', children[i] ).text();

        // Check for the keyword, but convert everything to lower case to make
        // the search non-case-sensitive.
        if ( colorName.toLowerCase().indexOf( keyword.toLowerCase() ) >= 0 ) {
          $( children[i] ).show();
        } else {
          $( children[i] ).hide();
        }
      }
    }

  } );

} )( jQuery );

export default ColorSearch;
