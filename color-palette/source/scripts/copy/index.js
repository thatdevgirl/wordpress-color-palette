/**
 * Copy functionality for an individual color block.
 *
 * The front-end copy button copies the hex code of an individual color.
 */

const ColorCopy = ( ($) => {

  $( document ).ready( () => {

    $( '.cp-copy-hex' ).click( (e) => {
      e.preventDefault();

      // Get the parent color element of the clicked copy button.
      const parent = $(e.currentTarget).parent('.cp-color-hex');

      // Get the color hex code by getting the text of the parent.
      const hex = parent.text().trim();
      
      // Copy the hex code to the clipboard.
      navigator.clipboard.writeText(hex);

      // Make sure all of the copy icons are visible, except for this one. 
      // In this case, display the "copy complete" icon instead.
      $( '.cp-copy-hex' ).show();
      $( '.cp-copy-complete' ).hide();
      $( '.cp-copy-hex', parent ).hide();
      $( '.cp-copy-complete', parent ).css( 'display', 'inline-block' );

      return;
    } );

  } );

} )( jQuery );

export default ColorCopy;