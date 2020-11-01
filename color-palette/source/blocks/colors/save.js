/**
 * SAVE: Colors
 */

const ColorsSave = ( props ) => {

  const { InnerBlocks } = wp.blockEditor;

  return (
    <div className='cp-palette'>
      <div className='cp-colors'>
        <InnerBlocks.Content />
      </div>
    </div>
  );

};

export default ColorsSave;
