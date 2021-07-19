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
  const onChangeHex       = ( value ) => { setAttributes( { hex: value.hex } ) };
  const onChangeLabel     = ( value ) => { setAttributes( { label: value } ) };

  // Get the automatic name for this hex from the "Name That Color" API.
  // This will be used as the placeholder text for the Color Label attribute
  // and will be displayed on the front-end unless the user selects the option
  // to not display a label.
  ntc.init();
  const ntcName = hex ? ntc.name( hex ) : '';
  setAttributes( { autoLabel: ntcName[1] } );

  // Define the style for the color swatch in the editor.
  const swatchStyle = { background: hex };

  // Return the edit UI.
  return (
    <Fragment>

      <InspectorControls>

        <PanelBody title='Color Selection' initialOpen={ true }>
          <p>
            Select a color for this swatch from the picker below. A name will
            be automatically generated for your chosen color's label, but you
            can always change that name by typing over it in the editor.
          </p>

          <ColorPicker
            color={ hex }
            onChangeComplete={ onChangeHex }
            disableAlpha
          />
        </PanelBody>

      </InspectorControls>

      <div className='cp-color'>

        <div className='swatch' style={ swatchStyle }></div>

        <p className='cp-color-name'>
          <TextControl
            placeholder={ autoLabel }
            value={ label }
            onChange={ onChangeLabel }
          />
        </p>

      </div>

    </Fragment>
  );

};

export default ColorEdit;
