/**
 * SAVE: Colors
 */

import ColorsGetClasses from './get-classes.js';

const ColorsSave = ( props ) => {

  const { InnerBlocks } = wp.blockEditor;

  // Figure out what classes should be applied to the colors.
  const colorsClasses = ColorsGetClasses( props );

  return (
    <div className='cp-palette'>
      <div className={ colorsClasses }>
        <InnerBlocks.Content />
      </div>
    </div>
  );

};

export default ColorsSave;
