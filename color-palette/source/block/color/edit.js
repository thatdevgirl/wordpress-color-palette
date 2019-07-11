/**
 * EDIT: Color
 */

const { ColorPicker, PanelBody, TextControl } = wp.components;
const { InspectorControls } = wp.editor;
const { Fragment } = wp.element;

let colorPaletteEdit = ( props ) => {
  // Get the values needed from props.
  const { isSelected, setAttributes } = props;
  const { hex, label } = props.attributes;

  // Declare change event handlers.
  const onChangeHex   = ( value ) => { setAttributes( { hex: value.hex } ) };
  const onChangeLabel = ( value ) => { setAttributes( { label: value } ) };

  const swatchStyle = { background: hex };

  // Return the edit UI.
  return (
    <Fragment>
      { isSelected && (
        <InspectorControls>
          <PanelBody title='Color'>

          <ColorPicker
            color={ hex }
            onChangeComplete={ onChangeHex }
            disableAlpha
          />

          </PanelBody>
        </InspectorControls>
      ) }

      <div className='cp-color'>
        <div className='swatch' style={ swatchStyle }></div>

        <p className="cp-color-name">
          <TextControl
            placeholder='Color label'
            value={ label }
            onChange={ onChangeLabel }
          />
        </p>

        <p>{ hex }</p>
      </div>
    </Fragment>
  );
}

export default colorPaletteEdit;
