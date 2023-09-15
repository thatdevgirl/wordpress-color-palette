/**
 * EDIT: Colors
 */

import { memoize, times } from 'lodash';
import { default as GetClasses } from './get-classes.js';

const ColorsEdit = ( props ) => {

  const { InnerBlocks, InspectorControls, useBlockProps } = wp.blockEditor;
  const { PanelBody, ToggleControl } = wp.components;


  // Get attributes from props.
  const { setAttributes } = props;
  const { className, hideHex, hideRGB, hideCMYK, showCopy, search } = props.attributes;
  const blockProps = useBlockProps();


  // Figure out what classes should be applied to the colors.
  const colorsClasses = GetClasses( props );


  // Change event handlers.
  const onChangeHideHex  = ( value ) => { setAttributes( { hideHex: value } ) };
  const onChangeHideRGB  = ( value ) => { setAttributes( { hideRGB: value } ) };
  const onChangeHideCMYK = ( value ) => { setAttributes( { hideCMYK: value } ) };
  const onChangeShowCopy = ( value ) => { setAttributes( { showCopy: value } ) };
  const onChangeSearch   = ( value ) => { setAttributes( { search: value } ) };


  // Set of allowed child blocks.
  const allowedBlocks = [ 'tdg/color' ];


  // Template for child cards.
  const getColorsTemplate = memoize( () => {
    return times( 3, () => [ 'tdg/color' ] );
  } );

  
  // Return the edit UI.
  return (
    <div { ...blockProps }>

      <InspectorControls>
        <PanelBody title='Color code options' initialOpen={ true }>

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

          <ToggleControl
            label='Show copy button'
            help={ showCopy ? 'Copy button is displayed.' : 'Copy button is hidden.' }
            checked={ showCopy }
            onChange={ onChangeShowCopy }
          />

        </PanelBody>

        <PanelBody title='Search options' initialOpen={ true }>

          <ToggleControl
            label='Display color search'
            help={ search ? 'Search form is displayed.' : 'Search form is hidden.' }
            checked={ search }
            onChange={ onChangeSearch }
          />

        </PanelBody>
      </InspectorControls>

      <div className={`cp-palette ${ className }`}>
        <div className={ colorsClasses }>
          <InnerBlocks
            template={ getColorsTemplate() }
            allowedBlocks={ allowedBlocks }
          />
        </div>
      </div>

    </div>
  );

};

export default ColorsEdit;
