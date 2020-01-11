<style>
    .modal-backdrop {
        background-color: rgba(0, 0, 0, .0001) !important;

    }

</style>
<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form-kecamatan" method="POST"class="form-horizontal" data-toggle="validator"
                enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <h3 class="modal-title"></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                </div>
                <br>
               <div class="modal-body">
                    <input type="hidden" id="id_transaksi" name="id_transaksi">
                    <input type="hidden" id="id_detail_order" name="id_detail_order">
                    <input type="hidden" id="tanggal" name="tanggal">
                    <input type="hidden" id="qty" name="qty">
                    <div class="form-group">
                        <input type="hidden" class="form-control col-md-3" id="total_bayar" name="total_bayar">
                        <label for="kembalian" class="col-md-12 control-label">Bayar</label>
                        <div class="col-md-12">
                            <input type="text" id="kembalian" name="kembalian" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>
