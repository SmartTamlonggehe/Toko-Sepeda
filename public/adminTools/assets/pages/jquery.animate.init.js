/**
 * Theme: Crovex - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Animate Js
 */

// function testAnim(x) {
//     $('#animationSandbox').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
//         $(this).removeClass();
//     });
// };



// $(document).ready(function() {
//     $('.js--triggerAnimation').click(function(e) {
//         e.preventDefault();
//         var anim = $('.js--animations').val();
//         testAnim(anim);
//     });

//     $('.js--animations').change(function() {
//         var anim = $(this).val();
//         testAnim(anim);
//     });
// });

function testAnim(x) {
    $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + x + '  animated');
};
$('#myModal').on('show.bs.modal', function(e) {
    // var anim = $('#entrance').val();
    testAnim("slideInLeft");
})
$('#myModal').on('hide.bs.modal', function(e) {
    // var anim = $('#exit').val();
    testAnim("slideOutRight");
})

//adding animation