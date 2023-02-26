<div class="modal fade" id="service-create-update-modal">
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
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">{{ __('custom.name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">{{ __('custom.platform') }}</label>
                                    <select name="platform_id" id="platform_id" class="form-control text-dark">
                                        <option value="">{{ __('custom.select') }}</option>
                                        @foreach ($platforms as $platform)
                                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">{{ __('custom.status') }}</label>
                                    <select name="is_published" id="is_published" class="form-control text-dark">
                                        <option value="">{{ __('custom.select') }}</option>
                                        <option value="1">{{ __('custom.active') }}</option>
                                        <option value="0">{{ __('custom.inactive') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{ __('custom.offer_url') }}</label>
                                    <input type="text" name="offer_url" id="offer_url" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12" id="features-btn">
                                <div>

                                    <label for="">{{ __('custom.features') }}:</label>
                                    <button type="button" class="add_feature btn-xs btn-primary"
                                        onclick="addNewFeature($(this));"><i class="fa fa-plus"></i></button>
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
