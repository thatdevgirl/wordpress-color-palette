/**
 * BLOCK: Colors
 *
 * This block is the parent color palette block.
 */

import ColorsEdit from './edit.js';
import ColorsIcons from './icons.js';
import ColorsSave from './save.js';

const Colors = ( () => {

  const { registerBlockType } = wp.blocks;

  registerBlockType( 'tdg/colors', {
    title: 'Color Palette',
    description: 'Group of related color blocks.',
    category: 'widgets',
    keywords: [ 'colors', 'styles', 'visual identity' ],
    example: { attributes: {} }, // Show default example.
    icon: ColorsIcons.block,

    attributes: {
      style: { type: 'string', default: '' }
    },

    edit: ( props ) => { return ( ColorsEdit( props ) ); },
    save: ( props ) => { return ( ColorsSave( props ) ); }
  } );

} )();

export default Colors;
