/**
 * DEPRECATED: Colors
 */

import { default as GetClasses } from './get-classes.js';

const ColorsDeprecated = [
  {
    attributes: {
      hideHex:  { type: "boolean", default: false },
      hideRGB:  { type: "boolean", default: false },
      hideCMYK: { type: "boolean", default: false },
      search: { type: "boolean", default: false }
    },

    save: ( props ) => {
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
            <fieldset>
              <label className='cp-palette-search-label'>Search for a color</label>
              <input type='text' className='cp-palette-search-input' />
            </fieldset>
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
    }

  }
];

export default ColorsDeprecated;