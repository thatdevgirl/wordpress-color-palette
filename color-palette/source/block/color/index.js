/**
 * BLOCK: Color
 *
 * This block is the child block to the color palette block.
 */

import ColorEdit from './edit.js';
import ColorIcons from './icons.js';

const Color = ( () => {

  const { registerBlockType } = wp.blocks;

  registerBlockType( 'tdg/color', {
    title: 'Color',
    description: 'Single color block.',
    category: 'widgets',
    icon: ColorIcons.block,
    example: { attributes: {} }, // Show default example.
    edit: ( props ) => { return ( ColorEdit( props ) ); },
    save: () => { return null; }

  } );

} )();

export default Color;
