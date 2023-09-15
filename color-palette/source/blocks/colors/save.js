/**
 * SAVE: Colors
 */

import { default as GetClasses } from './get-classes.js';

const ColorsSave = ( props ) => {

  const { InnerBlocks } = wp.blockEditor;

  // Get the values needed from props.
  const { className, search } = props.attributes;

  // Figure out what classes should be applied to the colors.
  const colorsClasses = GetClasses( props );

  // Set up container classes. 
  let containerClasses = className ? className + ' cp-palette' : 'cp-palette';

  // Create the search form markup (optional).
  let maybeSearch = '';
  if ( search ) {
    maybeSearch = (
      <form className='cp-palette-search'>
        <fieldset>
          <label className='cp-palette-search-label'>Search for a color</label>
          <input type='text' className='cp-palette-search-input' />
        </fieldset>
        <input type='submit' className='cp-palette-search-submit' value='Search' />
      </form>
    );
  }

  return (
    <div className={ containerClasses }>
      { maybeSearch }
      <div className={ colorsClasses }>
        <InnerBlocks.Content />
      </div>
    </div>
  );

};

export default ColorsSave;
