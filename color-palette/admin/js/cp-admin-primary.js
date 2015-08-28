var cpAdminPrimary = {
    className: 'cp-primary',

    init: function() {
        // Get number of primary colors.
        this.colorCount = document.getElementsByClassName(this.className).length;

        // Create clone of primary color form row.
        this.clone = this.cloneFormRow();

        // Set up add click event.
        this.setAddEvent();

        // Set up delete click event.
        this.setDelEvent();
    },

    cloneFormRow: function() {
        // Get the block and create the clone.
        var block = document.getElementsByClassName(this.className)[0];
        var clone = block.cloneNode(true);

        // Clear out the name and value attributes.
        clone.getElementsByTagName('input')[0].setAttribute('value', '');
        clone.getElementsByTagName('input')[0].setAttribute('name', '');

        return clone;
    },

    setAddEvent: function() {
        var _this = this;
        var addLink = document.getElementsByClassName('cp-primary--add')[0];

        addLink.onclick = function(e) {
            e.preventDefault();
            _this.addEvent(this);
        };
    },

    addEvent: function(context) {
        var clone = this.clone.cloneNode(true);
        clone.getElementsByTagName('input')[0].setAttribute('name', 'primaryColors[' + this.colorCount + ']');

        this.colorCount++;

        document.getElementById('cp-primary').innerHTML += '<div class="' 
                                                        +  this.className 
                                                        +  '">' 
                                                        +  clone.innerHTML 
                                                        + '</div>';
    },

    setDelEvent: function() {
        var _this = this;
        var delLinks = document.getElementsByClassName('cp-primary--del');

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

cpAdminPrimary.init();