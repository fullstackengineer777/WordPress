/**
 * Slim select js.
 * Custom js file to init the slim select in customizeru
 *
 * @see https://slimselectjs.com/
 * @license MIT
 */
(function (api) {

    api.controlConstructor['sports-highlight-dropdown-control'] = api.Control.extend({

        ready: function () {
            var control = this;
            var dropDownID = document.getElementById(`slim-select-${control.id}`);
            var dataLimit = null !== dropDownID.getAttribute('data-limit') ? parseInt(dropDownID.getAttribute('data-limit')) : 0;

            /**
             * Initialize the slim select.
             */
            var select = new SlimSelect({
                select: dropDownID,
                searchHighlight: true,
                limit: dataLimit,
                closeOnSelect: (dataLimit > 1) ? false : true,
                allowDeselectOption: true,
                beforeOpen: function () {
                    this.slim.content.style.position = 'relative';
                },
            });

            var getSelectedItem = control.setting.get();
            if ('undefined' !== typeof getSelectedItem) {
                select.set(getSelectedItem);
            }

            this.container.on('change', dropDownID, function () {
                var selectedItem = select.selected();
                control.setting.set(selectedItem);
            });

        }

    });

})(wp.customize);