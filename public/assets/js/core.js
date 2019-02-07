$(function() {
    /** INITIALISATIONS OBJETS MATERIALIZE **/
    $('.sidenav').sidenav({edge: 'right'});
    /** FIN INITIALISATIONS OBJETS MATERIALIZE **/
    var parallax = document.querySelectorAll('.parallax');
    for(var i = 0; i < parallax.length; i++) {
        parallax[i].style.background = 'url(' + parallax[i].dataset.img + ') no-repeat top fixed';
    }
    //console.log($('.parallax').dataset.data.dataImg);
    //$('.parallax').css('background', 'url('+$(this).dataset.dataImg+') no-repeat top fixed');

    /** FONCTIONS PERSONNALISÉES **/
    /**
     * @type {{create: Window.form.create}}
     */
    window.form = {
        /**
         * @param $formId ID du formulaire ( id="id" )
         * @param $function La fonction qui va être executée après l'execution du PHP
         * @returns swal ( sweet-alert ) Retourne une alerte visuelle
         */
        create: function ($formId, $function) {
            $form = $('#' + $formId);
            var action = document.querySelector('#' + $formId).dataset.action;
            $form.bind('submit', function () {
                $.ajax({
                    type: 'POST',
                    url: action,
                    data: $form.serialize(),
                    success: function (html) {
                        $function(html);
                    }
                });
                return false;
            });
        }
        /** FIN FONCTIONS PERSONNALISÉES **/


    };

});
