var cpAdmin = {
    colorTypes: [],

    init: function() {
        this.colorTypes['cp-primary'] = document.getElementById('cp-primary');
        this.colorTypes['cp-accent']  = document.getElementById('cp-accent');

        // Create clone of primary color form row.
        this.clone = this.cloneFormRow();

        // Set up add click event.
        this.setAddEvent();

        // Set up delete click event.
        this.setDelEvents();

        console.log('in init');
    },

    cloneFormRow: function() {
        // Get the block and create the clone.
        var block = document.getElementsByClassName('template')[0];
        var clone = block.cloneNode(true);
        return clone;
    },

    setAddEvent: function() {
        var _this = this;
        var addLinks = document.getElementsByClassName('cp--add');

        for (var i=0; i<addLinks.length; i++) {
            addLinks[i].onclick = function(e) {
                e.preventDefault();
                _this.addEvent(this);
                _this.setDelEvents();
            };
        }
    },

    addEvent: function(context) {
        // Get parent node information.
        var parent    = context.parentNode;
        var container = parent.getElementsByClassName('cp-input-block')[0];

        var id   = parent.getAttribute('id');
        var name = parent.getAttribute('data-name');
        
        // Get number of elements for that color.
        var count = this.colorTypes[id].getElementsByClassName('cp-colors').length;

        // Set up the new row.
        var clone = document.createElement('div');
        clone.classList.add('cp-colors');
        clone.innerHTML = this.clone.innerHTML;

        // Set the name for the name input field.
        var inputForName = clone.getElementsByClassName('new-input-name')[0];
        inputForName.setAttribute('name', name + 'Names[' + count + ']');

        // Set the name for the hex input field.
        var inputForHex = clone.getElementsByClassName('new-input-hex')[0];
        inputForHex.setAttribute('name', name + '[' + count + ']');

        // Add the cloned row to the container.
        container.appendChild(clone);
    },

    setDelEvents: function() {
        var _this = this;
        var delLinks = document.getElementsByClassName('cp--del');

        for (var i=0; i<delLinks.length; i++) {
            delLinks[i].onclick = function(e) {
                e.preventDefault();
                _this.delEvent(this);
            };
        }
    },

    delEvent: function(context) {
        var block = context.parentNode;
        block.parentNode.removeChild(block);
    }
};

cpAdmin.init();
