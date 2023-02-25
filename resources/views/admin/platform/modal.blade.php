<div class="modal fade" id="platform-create-update-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="">{{ __('custom.logo') }}</label>

                                <div class="avatar-picture">
                                    <div class="image-input image-input-outline" id="imgUserProfile">
                                        <div class="image-input-wrapper" id="image-input-wrapper-1"
                                            style="background-image: url('{{ asset('black/img/placeholder-img.webp') }}');">
                                        </div>
                                        <label class="btn">
                                            <i>
                                                <img src="{{ asset('black/img/edit.svg') }}" alt=""
                                                    class="img-fluid">
                                            </i>
                                            <input type="file" name="logo" id="changeImg_1"
                                                accept=".png, .jpg, .jpeg">
                                            <input type="button" value="Upload" id="uploadButton_1">
                                        </label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">{{ __('custom.name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default"
                        data-dismiss="modal">{{ __('custom.close') }}</button>
                    <button type="submit" class="btn btn-success">{{ __('custom.submit') }}</button>
                    <button type="reset" hidden></button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
