/**
 * SAVE: Colors
 */

import { default as GetClasses } from './get-classes.js';

const ColorsSave = ( props ) => {

  const { InnerBlocks } = wp.blockEditor;

  // Get the values needed from props.
  const { search } = props.attributes;

  // Figure out what classes should be applied to the colors.
  const colorsClasses = GetClasses( props );

  // Create the search form markup (optional).
  let maybeSearch = '';
  if ( search ) {
    maybeSearch = (
      <form className='cp-palette-search'>
        <label for='cp-palette-search-input' className='cp-palette-search-label'>Search for a color</label>
        <input type='text' id='cp-palette-search-input' className='cp-palette-search-input' />
        <input type='submit' className='cp-palette-search-submit' value='Search' />
      </form>
    );
  }

  return (
    <div className='cp-palette'>
      { maybeSearch }
      <div className={ colorsClasses }>
        <InnerBlocks.Content />
      </div>
    </div>
  );

};

export default ColorsSave;
