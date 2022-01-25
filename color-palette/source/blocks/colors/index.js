/**
 * BLOCK: Colors
 *
 * This block is the parent color palette block.
 */

import { default as Edit } from './edit.js';
import { default as Icons } from './icons.js';
import { default as Metadata } from './block.json';
import { default as Save } from './save.js';

const Colors = ( () => {

  const { registerBlockType } = wp.blocks;

  registerBlockType( Metadata, {
    icon: Icons.block,

    styles: [
      { name: 'basic-card',    label: 'Basic Card', isDefault: true },
      { name: 'stylized-card', label: 'Stylized Card' },
      { name: 'circle',        label: 'Circle' },
    ],

    edit: ( props ) => { return ( Edit( props ) ); },
    save: ( props ) => { return ( Save( props ) ); }
  } );

} )();

export default Colors;
