$(function() {
    /** INITIALISATIONS OBJETS MATERIALIZE **/
    $('.sidenav').sidenav({edge: 'right'});
    $('#slide-out > li').on('click', function() {
        setTimeout(function() { window.scrollBy(0, -64); }, 500);
    });
    /** FIN INITIALISATIONS OBJETS MATERIALIZE **/
    
    
    /** FONCTIONS PERSONNALISÉES **/
    window.form = {
        /**
         * @param string $formId ID du formulaire ( id="id" )
         * @param function $function La fonction qui va être executée après l'execution du PHP
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
