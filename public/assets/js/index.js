$(function() {
    /** AFFICHAGE DES ARTICLES DYNAMIQUEMENT **/
    $('.open-new').on('click', function() {
        $('.card-news').slideUp();
        $('#' + $(this)[0].dataset.open).slideDown();
    });
    /** FIN AFFICHAGE DES ARTICLES DYNAMIQUEMENT **/
    /** AFFICHAGE DES RESSOURCES **/
    $('#showAllSources').on('click', function() {
       $('#threeSources').slideUp();
       $('#allSources').slideDown();
    });
    /** FIN AFFICHAGE DES RESSOURCES **/
});