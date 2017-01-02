<!-- Modal -->
<div id="order_feedback_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Rendelés visszajelzés</h4>
            </div>
            <div class="modal-body">
                <div class="alert-success col-xs-24" style="display: none" id="modal-order-succes">

                    <div class="col-xs-16 col-xs-offset-4">

                        Köszönjük rendelését!<br>
                        Munkatársunk fel fogja venni önnel a kapcsolatot.

                        A megrendelő ablak hamarosan bezárul.
                        <div class="progress">
                            <div id="progressBarId" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width:100%">

                            </div>
                        </div>
                    </div>

                </div>

                <div class="alert-warning col-xs-24" style="display: none" id="modal-order-error">

                    <div class="col-xs-16 col-xs-offset-4">
                        Hiba történt a rendelés közben!<br>
                        Kérem, próbálja meg később.
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Ablak Bezárása</button>
            </div>
        </div>

    </div>
</div>