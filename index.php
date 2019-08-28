<?php if (!defined('ROOT_PATH')) {exit('No Permission');}?>

<div class="container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="row m-l-15" id="formBtn">
                        <button id="btn-add" class="btn btn-default waves-effect waves-light m-t-30 m-b-10 m-r-15"><?=__('New discount type')?> <i class="fa fa-plus"></i></button>
							<button type="button" class="btn btn-default waves-effect m-b-15" id="btn-refresh"><?=__('刷新')?></button>&nbsp;&nbsp;
                    </div>

                    <div class="panel-body">
                        <table id="tableWrapper" class="table table-striped table-bordered table-responsive"></table>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>

<div id="editMemlevelModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
        <div class="modal-dialog" style="width: 750px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <form role="form" id="memlevelsForm" class="form-horizontal">
                    <div class="modal-body">
                        <div class="col-sm-9 col-md-9 col-lg-9">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="description"><?=__('Description')?></label>
                                        <div class="col-sm-9 col-md-9 col-lg-9 p-0">
                                            <input type="text" placeholder="" id="description" name="description" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="col-sm-3 col-md-3 col-lg-3 control-label" for="status"><?=__('Status')?></label>
                                        <div class="col-sm-9 col-md-9 col-lg-9 p-0">
                                            <input type="text" name="status" id="status" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="modal-footer tc">
                        <button type="submit" class="btn b-racius3 btn-warning waves-effect waves-light" id="btnDelay"><?=__('保存')?></button>
                        <button type="button" class="btn b-racius3 btn-default waves-effect" data-dismiss="modal"><?=__('取消')?></button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<script src="<?=$this->js('controllers/discount/type')?>" charset="utf-8"></script>