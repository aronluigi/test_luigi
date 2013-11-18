/**
 * Created by aronluigi on 18/11/13.
 */

var Test = {};

$(document).ready(function() {
    $('[data-js]').each(function() {
        var controllerName = $(this).data('js');

        if (controllerName.length) {
            Test[controllerName].init();
        } else {
            console.log('JS controller ' + controllerName + ' not found !');
        }
    });
});