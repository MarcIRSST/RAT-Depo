/* global tinymce */

(function () {
    tinymce.PluginManager.add('my_mce_button', function (editor, url) {
        editor.addButton('mybutton', {
            text: 'Bouton',
            onclick: function () {
                editor.windowManager.open({
                    title: 'Insert a button',
                    body: [{
                            type: 'textbox',
                            name: 'buttonLabel',
                            label: 'Titre du bouton:',
                            placeholder: 'Appel à l\'action'
                        },
                        {
                            type: 'textbox',
                            name: 'buttonLink',
                            label: 'Lien du bouton',
                            placeholder: 'https://exemple.com'
                        },
                        {
                            type: 'checkbox',
                            name: 'externalLink',
                            label: 'Est-ce un lien externe?'
                        }
                    ],
                    onsubmit: function (e) {
                        let target = null;

                        if (e.data.externalLink === true) {
                            target = 'target="_blank" class="cta--external"';
                        }
                        else {
                            target = 'class="cta--secondary"';
                        }

                        if (e.data.buttonLink !== '' && e.data.buttonLabel !== '') {
                            let button = '';
                            button += `<a ${target} href="${e.data.buttonLink}">`;
                            button += `<span class="button-text">${e.data.buttonLabel}</span>`;
                            button += '</a>';
                            editor.insertContent(button);
                        }
                    }
                });
            }
        });
        editor.addButton('treize-tooltip', {
            text: 'Tooltip',
            onclick: function () {
                editor.windowManager.open({
                    title: 'Ajouter un tooltip',
                    body: [{
                            type: 'label',
                            html: '<div style="padding: 16px; background: #ececec; font-size: 14px;"><b>Information </br></b>Le ID de la ressource se trouve dans l\'url admin de celui-ci.</br>Exemple: <em>wp-admin/post.php?post=<b>215</b>&action=edit</em></div>',
                            icon: 'question'
                        },
                        {
                            type: 'textbox',
                            name: 'ressourceId',
                            label: 'ID de la ressource à intégrer'
                        },
                        {
                            type: 'textbox',
                            name: 'tooltipLabel',
                            label: 'Texte du lien'
                        }
                    ],
                    onsubmit: function (e) {
                        if (e.data.ressourceId !== '' && e.data.tooltipLabel !== '') {
                            editor.insertContent('[tooltip-treize id="' + e.data.ressourceId + '" text="' + e.data.tooltipLabel + '"]');
                        }
                    }
                });
            }
        });
        editor.addButton('treize-tables', {
            text: 'Tableau',
            onclick: function () {
                editor.windowManager.open({
                    title: 'Ajouter un Tableau',
                    body: [{
                            type: 'label',
                            html: '<div style="padding: 16px; background: #ececec; font-size: 14px;"><b>Information </br></b>Le ID du tableau se trouve dans l\'url admin de celui-ci.</br>Exemple: <em>wp-admin/post.php?post=<b>215</b>&action=edit</em></div>',
                            icon: 'question'
                        },
                        {
                            type: 'textbox',
                            name: 'tableId',
                            label: 'ID du tableau à intégrer'
                        }
                    ],
                    onsubmit: function (e) {
                        if (e.data.ressourceId !== '' && e.data.tooltipLabel !== '') {
                            editor.insertContent('[table-treize id="' + e.data.tableId + '"]');
                        }
                    }
                });
            }
        });
        editor.addButton('treize-bordered-content', {
            text: 'Encadré',
            onclick: function () {
                editor.windowManager.open({
                    title: 'Ajouter un encadré',
                    body: [{
                        type: 'label',
                        html: 'Simplement cliquer sur OK et commencer à entrer du contenu dans un encadré.'
                    }],
                    onsubmit: function (e) {
                        if (e.data.ressourceId !== '' && e.data.tooltipLabel !== '') {
                            editor.insertContent('<div class=bordered-content><p>Entrer votre contenu ici.</p></div>');
                        }
                    }
                });
            }
        });
    });
})();
