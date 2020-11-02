/**
 * BLOCK: Colors
 *
 * This block is the parent color palette block.
 */

import ColorsEdit from './edit.js';
import ColorsExample from './example.js';
import ColorsIcons from './icons.js';
import ColorsSave from './save.js';

const Colors = ( () => {

  const { registerBlockType } = wp.blocks;

  registerBlockType( 'tdg/colors', {
    title: 'Color Palette',
    description: 'A group of related color swatches.',
    category: 'design',
    keywords: [ 'colors', 'styles', 'visual identity' ],
    icon: ColorsIcons.block,
    example: ColorsExample,

    styles: [
      { name: 'basic-card',    label: 'Basic Card', isDefault: true },
      { name: 'stylized-card', label: 'Stylized Card' },
      { name: 'circle',        label: 'Circle' },
    ],

    attributes: {
      hideHex:  { type: 'boolean' },
      hideRGB:  { type: 'boolean' },
      hideCMYK: { type: 'boolean' }
    },

    edit: ( props ) => { return ( ColorsEdit( props ) ); },
    save: ( props ) => { return ( ColorsSave( props ) ); }
  } );

} )();

export default Colors;
