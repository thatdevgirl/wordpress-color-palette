/**
 * BLOCK: Color
 *
 * This block is the child block to the color palette block.
 */

import colorEdit from './edit.js';
import colorIcons from './icons.js';

( function() {
  console.log('foo');

  const { registerBlockType } = wp.blocks;

  registerBlockType( 'tdg/color', {
    title: 'Color',
    description: 'Single color for use in the color palette.',
    category: 'widgets',
    icon: colorIcons.block,
    edit: colorEdit,
    save: () => { return null; }
  } );

} )();
