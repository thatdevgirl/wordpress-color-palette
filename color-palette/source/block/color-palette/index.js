/**
 * BLOCK: Register a custom color palette block
 *
 * This block is a parent block to the custom individual color block.
 */

import tdgColorPaletteIcons from './icons.js';

( function() {

  const { registerBlockType } = wp.blocks;

  registerBlockType( 'tdg/color-palette', {
    title: 'Color Palette',
    description: 'Create a block of colors',
    category: 'widgets',
    keywords: [ 'visual identity', 'style guide' ],
    icon: tdgColorPaletteIcons.block,

    /*
     * Edit UI functionality.
     */

    edit: ( props ) => {
      const { } = props.attributes;

      return (
        <div>
          Hello.
        </div>
      );
    },

    /*
     * Front-end UI.
     */

    save: ( props ) => {
      const { } = props.attributes;

      return (
        <div>
          Hello.
        </div>
      );
    }

  } );

} )();
