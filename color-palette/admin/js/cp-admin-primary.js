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
        this.setDelEvent();
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
            };
        }
    },

    addEvent: function(context) {
        // Get parent node information.
        var parent    = context.parentNode;
        var container = parent.getElementsByTagName('div')[0];

        var id   = parent.getAttribute('id');
        var name = parent.getAttribute('data-name');
        
        // Get number of elements for that color.
        var count = this.colorTypes[id].getElementsByClassName('cp-colors').length;

        // Set up the new row.
        var clone = this.clone.cloneNode(true);
        clone.getElementsByTagName('input')[0].setAttribute('name', name + '[' + count + ']');

        container.innerHTML += clone.innerHTML;
    },

    setDelEvent: function() {
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