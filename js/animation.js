(function($) {
 
    'use strict';
 
    /**
 *     * Sets a CSS3 animation
 *         *
 *             * @param string effect
 *                 * @param function callback
 *                     * @return object self
 *                         */
    $.fn.setAnimation = function(effect, callback) {
        var self = this;
 
        self
            .addClass('animated '+ effect)
            .on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                /**
 *                 * Callback needed?
 *                                 */
                if(callback) {
                    callback(self);
                }
        });
 
        /**
 *         * Preserving chainability
 *                 */
        return self;
    };
}(jQuery));
