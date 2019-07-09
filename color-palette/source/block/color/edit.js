/**
 * EDIT: Color
 */

const { PanelBody, TextControl } = wp.components;
const { InspectorControls } = wp.editor;
const { Fragment } = wp.element;

let colorPaletteEdit = ( props ) => {
  // Get the values needed from props.
  const { isSelected, setAttributes } = props;
  const { hex, label } = props.attributes;

  // Declare change event handlers.
  const onChangeHex   = ( value ) => { setAttributes( { hex: value } ) };
  const onChangeLabel = ( value ) => { setAttributes( { label: value } ) };

  // Return the edit UI.
  return (
    <Fragment>
      { isSelected && (
        <InspectorControls>
          <PanelBody title='Color'>

            <TextControl
              label='Color hex value'
              value={ hex }
              onChange={ onChangeHex }
            />

            <TextControl
              label='Color label'
              value={ label }
              onChange={ onChangeLabel }
            />

          </PanelBody>
        </InspectorControls>
      ) }
    </Fragment>
  );
}

export default colorPaletteEdit;
