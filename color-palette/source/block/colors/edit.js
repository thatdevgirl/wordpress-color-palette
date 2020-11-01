/**
 * EDIT: Colors
 */

import { memoize, times } from 'lodash';

const ColorsEdit = ( props ) => {

  const { InnerBlocks, InspectorControls } = wp.blockEditor;
  const { PanelBody, RadioControl } = wp.components;
  const { Fragment } = wp.element;

  // Get the values needed from props.
  const { setAttributes } = props;
  const { style } = props.attributes;

  // Declare change event handlers.
  const onChangeStyle = ( value ) => { setAttributes( { style: value } ) };

  // Set of allowed child blocks.
  const allowedBlocks = [ 'tdg/color' ];

  // Template for child cards.
  const getColorsTemplate = memoize( () => {
    return times( 4, () => [ 'tdg/color' ] );
  } );

  // Return the edit UI.
  return (
    <Fragment>

      <InspectorControls>
        <PanelBody title='Style options'>

        <RadioControl
          label='Color block styles'
          help="Select how the individual color blocks should be displayed in the palette."
          selected={ style }
          options={ [
            { label: 'Basic card', value: '' },
            { label: 'Stylized card', value: ' stylized-card' },
            { label: 'Circle', value: ' circle' },
          ] }
          onChange={ onChangeStyle }
        />

        </PanelBody>
      </InspectorControls>

      <div className='cp-palette'>
        <div className={`cp-colors${ style }`}>
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
