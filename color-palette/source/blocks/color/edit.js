/**
 * EDIT: Color
 */

import ntc from '../../vendor/ntc.js';

const ColorEdit = ( props ) => {

  const { ColorPicker, PanelBody, TextControl } = wp.components;
  const { InspectorControls } = wp.blockEditor;
  const { Fragment } = wp.element;

  // Get the values needed from props.
  const { setAttributes } = props;
  const { hex, label, autoLabel } = props.attributes;

  // Declare change event handlers.
  const onChangeHex   = ( value ) => { setAttributes( { hex: value.hex } ) };
  const onChangeLabel = ( value ) => { setAttributes( { label: value } ) };

  // Get the automatic name for this hex from the "Name That Color" API.
  // This will be used as the placeholder text for the Color Label attribute
  // and will be displayed on the front-end unless the user selects the option
  // to not display a label.
  ntc.init();
  const ntcName = ntc.name( hex );
  setAttributes( { autoLabel: ntcName[1] } );

  const swatchStyle = { background: hex };

  // Return the edit UI.
  return (
    <Fragment>

      <InspectorControls>

        <PanelBody title='Color selection'>
          <ColorPicker
            color={ hex }
            onChangeComplete={ onChangeHex }
            disableAlpha
          />
        </PanelBody>

      </InspectorControls>

      <div className='cp-color'>

        <div className='swatch' style={ swatchStyle }></div>

        { hex && (
          <Fragment>
            <p className='cp-color-name'>
              <TextControl
                placeholder={ autoLabel }
                value={ label }
                onChange={ onChangeLabel }
              />
            </p>

            <p className='cp-color-hex'>{ hex }</p>
          </Fragment>
        ) }

      </div>

    </Fragment>
  );

};

export default ColorEdit;
