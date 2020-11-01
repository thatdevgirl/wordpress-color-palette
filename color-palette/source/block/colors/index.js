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
    icon: ColorsIcons.block,
    edit: () => { return ( ColorsEdit() ); },
    save: () => { return ( ColorsSave() ); }
  } );

} )();

export default Colors;
