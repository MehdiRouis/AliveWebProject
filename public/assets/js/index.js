$(function() {
    /** INITIALISATIONS OBJETS MATERIALIZE **/
    /** CAROUSEL **/
    $('.carousel').carousel({
        indicators: true
    });
    setInterval(function () {
        $('.carousel').carousel('next');
    }, 5000);
    /** FIN CAROUSEL **/
    /** TOOLTIPS **/
    $('.tooltipped').tooltip();
    /** FIN TOOLTIPS **/
    /** MODALS **/
    $('.modal').modal();
    /** FIN MODALS **/
    /** FIN INITIALISATIONS OBJETS MATERIALIZE **/
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