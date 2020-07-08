/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../scss/app.scss');

// Need jQuery? Install it with 'yarn add jquery', then uncomment to require it.
const $ = require('jquery');
window.$ = window.jQuery = $;

// load the JS bootstrap part - note that bootstrap doesn't export anything
require('bootstrap');

const dt = require('datatables.net-bs4')(window, $);

$(document).ready(function () {
    $('#projectTable').dataTable({
        language: {
            decimal: '',
            emptyTable: 'Aucune donnée n\'est disponible pour ce tableau',
            info: 'Affichage des lignes _START_ à _END_ ',
            infoEmpty: 'Affichage des lignes 0 à 0 parmis 0 lignes',
            infoFiltered: '(Filtré à partir des _MAX_ lignes)',
            infoPostFix: '',
            thousands: ',',
            lengthMenu: 'Nombre de lignes affichées _MENU_ ',
            loadingRecords: 'Chargement...',
            processing: 'Traitement en cours...',
            search: 'Recherche ',
            zeroRecords: 'Aucune correspondance trouvée',
            paginate: {
                first: 'Premier',
                last: 'Dernier',
                next: 'Suivant',
                previous: 'Precédent',
            },
            aria: {
                sortAscending: ': Activer pour trier la colonne par ordre croissant',
                sortDescending: ': Activer pour trier la colonne par ordre décroissant',
            },
        },
    });
});
