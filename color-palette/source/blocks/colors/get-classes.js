/**
 * BLOCK MODULE: Colors
 *
 * Get the list of classes for the palette container.
 */

const ColorsGetClasses = ( props ) => {

  // Get attributes from props.
  const { hideHex, hideRGB, hideCMYK } = props.attributes;

  // Set base class.
  let classes = 'cp-colors';

  // Set additional classes based on attributes.
  if ( hideHex )  { classes += ' hide-hex'; }
  if ( hideRGB )  { classes += ' hide-rgb'; }
  if ( hideCMYK ) { classes += ' hide-cmyk'; }

  return classes;

};

export default ColorsGetClasses;
