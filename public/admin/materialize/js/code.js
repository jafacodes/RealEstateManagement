/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $('ul.tabs').tabs({swipeable:'true'});
    $("#next1").click(function () {
        $('ul.tabs').tabs('select_tab', 'test-swipe-2');
    });
    $("#next2").click(function () {
        $('ul.tabs').tabs('select_tab', 'test-swipe-3');
    });
    $('.chips').material_chip();
    $('.chips-autocomplete').material_chip({
        autocompleteOptions: {
            data: {
                'Apple': null,
                'Microsoft': null,
                'Google': 'images/appIcon.png'
            },
            limit: Infinity,
            minLength: 1
        }
    });
});

var chip = {
    tag: 'chip content',
    image: '', //optional
    id: 1 //optional
};







