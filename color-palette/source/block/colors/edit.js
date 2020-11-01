/**
 * EDIT: Colors
 */

import { memoize, times } from 'lodash';

const ColorsEdit = () => {

  const { InnerBlocks } = wp.blockEditor;

  // Set of allowed child blocks.
  const allowedBlocks = [ 'tdg/color' ];

  // Template for child cards.
  const getColorsTemplate = memoize( () => {
    return times( 4, () => [ 'tdg/color' ] );
  } );

  // Return the edit UI.
  return (
    <div className='cp-palette'>
      <div className='cp-colors'>
        <InnerBlocks
          template={ getColorsTemplate() }
          allowedBlocks={ allowedBlocks }
        />
      </div>
    </div>
  );

};

export default ColorsEdit;
