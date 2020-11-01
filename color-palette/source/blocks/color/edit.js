/**
 * EDIT: Color
 */

const ColorEdit = ( props ) => {

  const { ColorPicker, PanelBody, TextControl } = wp.components;
  const { InspectorControls } = wp.blockEditor;
  const { Fragment } = wp.element;

  // Get the values needed from props.
  const { setAttributes } = props;
  const { hex, label } = props.attributes;

  // Declare change event handlers.
  const onChangeHex   = ( value ) => { setAttributes( { hex: value.hex } ) };
  const onChangeLabel = ( value ) => { setAttributes( { label: value } ) };

  const swatchStyle = { background: hex };

  // Return the edit UI.
  return (
    <Fragment>

      <InspectorControls>
        <PanelBody title='Color'>

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
            placeholder='Color label'
            value={ label }
            onChange={ onChangeLabel }
          />
        </p>

        <p className='cp-color-hex'>{ hex }</p>
      </div>

    </Fragment>
  );

};

export default ColorEdit;
