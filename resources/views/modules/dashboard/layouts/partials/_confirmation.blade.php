@section('scripts')
    @parent
    <script>

        var retBtnconfirm;
        function confirm(b, type) {
            if (retBtnconfirm) {
                return true;
            }

            var title, text, type, confirmButtonText;
            var cancelButtonText = 'Nem, mégsem!';

            switch (type) {
                case 'disable':
                    title = 'Biztosan letiltja elemet?';
                    text = 'Az elem ezután nem jelenik meg az oldalon.<br/>A letiltás bármikor visszaállítható!';
                    confirmButtonText = 'Igen, letiltom!';
                    type = 'warning';
                    break;

                case 'enable':
                    title = 'Biztosan engedélyezi az elemet?';
                    text = 'Az elem ezután megjelenik az oldalon.<br/>A engedélyezés bármikor visszavonható!';
                    confirmButtonText = 'Igen, engedélyezem!';
                    type = 'warning';
                    break;

                case 'destroy':
                    title = 'Biztosan törli az elemet?';
                    text = 'A törlés végleges, nem visszaállítható!';
                    confirmButtonText = 'Igen, törlöm!';
                    type = 'warning';
                    break;

                case 'multidisable':
                    if (!checkSelected(b)) {
                        return false;
                    }
                    title = 'Biztosan letiltja a kijelölt elemeket?';
                    text = 'Az elemek ezután nem jelenik meg az oldalon.<br/>A letiltás bármikor visszaállítható!';
                    confirmButtonText = 'Igen, letiltom!';
                    type = 'warning';
                    break;

                case 'multienable':
                    if (!checkSelected(b)) {
                        return false;
                    }
                    title = 'Biztosan engedélyezi a kijelölt elemeket?';
                    text = 'Az elemek ezután megjelennek az oldalon.<br/>A engedélyezés bármikor visszavonható!';
                    confirmButtonText = 'Igen, engedélyezem!';
                    type = 'warning';
                    break;

                case 'multidestroy':
                    if (!checkSelected(b)) {
                        return false;
                    }
                    title = 'Biztosan törli a kijelölt elemeket?';
                    text = 'A törlés végleges, nem visszaállítható!';
                    confirmButtonText = 'Igen, törlöm!';
                    type = 'warning';
                    break;

                default:
                    break;
            }

            swal(
                    {
                        title: title,
                        text: text,
                        type: type,
                        showCancelButton: true,
                        confirmButtonText: confirmButtonText,
                        cancelButtonText: cancelButtonText,
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger',
                        buttonsStyling: false
                    }).then(function () {
                retBtnconfirm = true;
                $(b).click();
            }, function (dismiss) {
            });

            return false;
        }

        function checkSelected(b) {
            var ids = $(b).closest('form').find('input[name="ids"]').val();
            if (ids == '') {
                swal(
                        'Hoppá...',
                        'Nincs kijelölt elem a művelethez!',
                        'error'
                );

                return false;
            }
            return true;
        }
    </script>
@stop