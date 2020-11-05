/**
 * BLOCK: Color
 *
 * This block is the child block to the color palette block.
 */

import ColorEdit from './edit.js';
import ColorExample from './example.js';
import ColorIcons from './icons.js';

const Color = ( () => {

  const { registerBlockType } = wp.blocks;

  registerBlockType( 'tdg/color', {
    title: 'Color',
    description: 'A single color block.',
    category: 'design',
    icon: ColorIcons.block,
    example: ColorExample,
    parent: [ 'tdg/color' ],
    edit: ( props ) => { return ( ColorEdit( props ) ); },
    save: () => { return null; }
  } );

} )();

export default Color;
