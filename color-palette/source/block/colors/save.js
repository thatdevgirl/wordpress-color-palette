/**
 * SAVE: Colors
 */

const ColorsSave = ( props ) => {

  const { InnerBlocks } = wp.blockEditor;

  // Get the values needed from props.
  const { style } = props.attributes;

  return (
    <div className='cp-palette'>
      <div className={`cp-colors${ style }`}>
        <InnerBlocks.Content />
      </div>
    </div>
  );

};

export default ColorsSave;
