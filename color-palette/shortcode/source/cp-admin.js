var cpAdmin = {
  colorTypes: [],

  init: function() {
    this.colorTypes['cp-primary'] = document.getElementById('cp-primary');
    this.colorTypes['cp-accent'] = document.getElementById('cp-accent');

    // Create clone of primary color form row.
    this.clone = this.cloneFormRow();

    // Set up add click event.
    this.setAddEvent();

    // Set up delete click event.
    this.setDelEvents();
  },

  cloneFormRow: function() {
    // Get the block and create the clone.
    let block = document.getElementsByClassName('template')[0];

    return ( block ) ? block.cloneNode(true) : false;
  },

  setAddEvent: function() {
    const _this = this;
    let addLinks = document.getElementsByClassName('cp-add');

    for (let i=0; i<addLinks.length; i++) {
      addLinks[i].onclick = function(e) {
        e.preventDefault();
        _this.addEvent(this);
        _this.setDelEvents();
      };
    }
  },

  addEvent: function(context) {
    // Get parent node information.
    const parent = context.parentNode;
    const container = parent.getElementsByClassName('cp-input-block')[0];
    const id = parent.getAttribute('id');
    const name = parent.getAttribute('data-name');

    // Get number of elements for that color.
    const count = this.colorTypes[id].getElementsByClassName('cp-colors').length;

    // Set up the new row.
    let clone = document.createElement('div');
    clone.classList.add('cp-colors');
    clone.innerHTML = this.clone.innerHTML;

    // Set the name for the name input field.
    let inputForName = clone.getElementsByClassName('new-input-name')[0];
    inputForName.setAttribute('name', name + 'Names[' + count + ']');

    // Set the name for the hex input field.
    let inputForHex = clone.getElementsByClassName('new-input-hex')[0];
    inputForHex.setAttribute('name', name + '[' + count + ']');

    // Add the cloned row to the container.
    container.appendChild(clone);
  },

  setDelEvents: function() {
    const _this = this;
    let delLinks = document.getElementsByClassName('cp-del');

    for (let i=0; i<delLinks.length; i++) {
      delLinks[i].onclick = function(e) {
        e.preventDefault();
        _this.delEvent(this);
      };
    }
  },

  delEvent: function(context) {
    const block = context.parentNode;
    block.parentNode.removeChild(block);
  }
};

cpAdmin.init();
