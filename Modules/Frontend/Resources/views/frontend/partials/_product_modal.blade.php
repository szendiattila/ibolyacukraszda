<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Rendelés</h4>
            </div>
            <form method="post" id="modal-form-id">
                <div class="modal-body form-group">
                    <label>Email cím:</label>
                    <input type="text" name="email" id="modal-email" value="" class="form-control">
                    <div id="modal-email-error" style="display: none;" class="alert-danger">
                        Nem megfelelő email cím!
                    </div>
                </div>

                <div class="modal-body form-group">
                    <label>Név:</label>
                    <input type="text" name="name" id="modal-name" value="" class="form-control">
                    <div id="modal-name-error" style="display: none;" class="alert-danger">
                        Adja meg a nevét kérem!
                    </div>
                </div>

                <div class="modal-body form-group">
                    <label>Megjegyzés:</label>
                    <input type="text" name="comment" id="modal-comment" value="" class="form-control">
                </div>

                <div class="modal-body form-group">
                    <p><label>Mennyiség:</label></p>

                    <div id="modal-quantity-div">
                        <input type="number" name="quantity" id="modal-quantity" class="form-control" value="1"
                               min="1"
                               step="1" max="999999">
                    </div>

                    <div id="modal-quantity-error" style="display: none;" class="alert-danger">
                        A mennyiségnek pozitív számjegynek kell lennie
                    </div>

                    <div class="row" id="modal-cake-slice-price">
                        <div class="col-md-6 taste-pcs-line">
                            <input type="radio" name="modal-cake-pcs" id="modal-cake-pcs-10" class="form-controll"
                                   onchange="modalCakePcsChange(10)">
                            <label for="modal-cake-pcs-10">10 szeletes
                                <div id="modal-pcs-10-label"></div>
                                .- Ft</label>
                        </div>
                        <div class="col-md-6 taste-pcs-line">
                            <input type="radio" name="modal-cake-pcs" id="modal-cake-pcs-20"
                                   onchange="modalCakePcsChange(20)">
                            <label for="modal-cake-pcs-20">20 szeletes
                                <div id="modal-pcs-20-label"></div>
                                .- Ft</label>
                        </div>
                        <input type="hidden" id="modal-pcs" value="10">


                    </div>

                </div>


                <div class="modal-body form-group">
                    <p><label>Rendelés adatai:</label></p>
                    <div id="modal-order-description"></div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal" id="modal-order-btn">Rendelés
                        leadása
                    </button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Mégsem</button>
                </div>
            </form>
        </div>

    </div>
</div>

