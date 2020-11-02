/**
 * EDIT: Colors
 */

import { memoize, times } from 'lodash';
import ColorsGetClasses from './get-classes.js';

const ColorsEdit = ( props ) => {

  const { InnerBlocks, InspectorControls } = wp.blockEditor;
  const { PanelBody, ToggleControl } = wp.components;
  const { Fragment } = wp.element;

  // Get attributes from props.
  const { setAttributes } = props;
  const { hideHex, hideRGB, hideCMYK } = props.attributes;

  // Figure out what classes should be applied to the colors.
  const colorsClasses = ColorsGetClasses( props );

  // Change event handlers.
  const onChangeHideHex  = ( value ) => { setAttributes( { hideHex: value } ) };
  const onChangeHideRGB  = ( value ) => { setAttributes( { hideRGB: value } ) };
  const onChangeHideCMYK = ( value ) => { setAttributes( { hideCMYK: value } ) };

  // Set of allowed child blocks.
  const allowedBlocks = [ 'tdg/color' ];

  // Template for child cards.
  const getColorsTemplate = memoize( () => {
    return times( 3, () => [ 'tdg/color' ] );
  } );

  // Return the edit UI.
  return (
    <Fragment>

      <InspectorControls>
        <PanelBody title='Color code display options'>

          <ToggleControl
            label='Hide Hex'
            help={ hideHex ? 'Hex code is hidden.' : 'Hex code is displayed.' }
            checked={ hideHex }
            onChange={ onChangeHideHex }
          />

          <ToggleControl
            label='Hide RGB'
            help={ hideRGB ? 'RGB code is hidden.' : 'RGB code is displayed.' }
            checked={ hideRGB }
            onChange={ onChangeHideRGB }
          />

          <ToggleControl
            label='Hide CMYK'
            help={ hideCMYK ? 'CMYK code is hidden.' : 'CMYK code is displayed.' }
            checked={ hideCMYK }
            onChange={ onChangeHideCMYK }
          />

        </PanelBody>
      </InspectorControls>

      <div className={`cp-palette ${ props.className }`}>
        <div className={ colorsClasses }>
          <InnerBlocks
            template={ getColorsTemplate() }
            allowedBlocks={ allowedBlocks }
          />
        </div>
      </div>

    </Fragment>
  );

};

export default ColorsEdit;
