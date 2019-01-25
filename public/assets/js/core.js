$(function() {
    /** INITIALISATIONS OBJETS MATERIALIZE **/
    $('.parallax').parallax();
    $('.sidenav').sidenav({edge: 'right'});
    /** FIN INITIALISATIONS OBJETS MATERIALIZE **/
    
    
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
