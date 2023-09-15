/**
 * BLOCK: Colors
 *
 * This block is the parent color palette block.
 */

import { default as Deprecated } from './deprecated.js';
import { default as Edit } from './edit.js';
import { default as Icons } from './icons.js';
import { default as Metadata } from './block.json';
import { default as Save } from './save.js';

const Colors = ( () => {

  const { registerBlockType } = wp.blocks;

  registerBlockType( Metadata, {
    deprecated: Deprecated,
    icon: Icons.block,
    edit: ( props ) => { return ( Edit( props ) ); },
    save: ( props ) => { return ( Save( props ) ); }
  } );

} )();

export default Colors;
