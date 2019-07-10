/**
 * BLOCK: Colors
 *
 * This block is the parent color palette block.
 */

import { memoize, times } from 'lodash';

( function() {

  const { registerBlockType } = wp.blocks;
  const { InnerBlocks } = wp.editor;

  registerBlockType( 'tdg/colors', {
    title: 'Color Palette',
    description: 'Block of related colors, for use in a style guide.',
    category: 'widgets',
    keywords: [ 'colors', 'styles', 'visual identity' ],
    //icon: guCtaDeckIcons.block,

    /*
     * Edit UI and functionality.
     */

    edit: () => {
      // Set of allowed child blocks.
      const allowedBlocks = [ 'tdg/color' ];

      // Template for child cards.
      const getColorsTemplate = memoize( () => {
        return times( 4, () => [ 'tdg/color' ] );
      } );

      // Return the edit UI.
      return (
        <div className='cp-palette'>
          <div className='cp-colors'>
            <InnerBlocks
              template={ getColorsTemplate() }
              allowedBlocks={ allowedBlocks }
            />
          </div>
        </div>
      );
    },

    /*
     * Front-end UI.
     */

    save: () => {
      return (
        <div className='cp-palette'>
          <div className='cp-colors'>
            <InnerBlocks.Content />
          </div>
        </div>
      );
    }
  });

})();
