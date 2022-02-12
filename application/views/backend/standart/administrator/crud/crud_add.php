<link rel="stylesheet" type="text/css" href="<?= BASE_ASSET; ?>css/crud.css">
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script src="<?= BASE_ASSET; ?>/float-thead/jquery.floatThead.min.js"></script>
<script type="text/javascript">
   //This page is a result of an autogenerated content made by running test.html with firefox.
   function domo(){
    
      // Binding keys
      $('*').bind('keydown', 'Ctrl+s', function assets() {
         $('#btn_save').trigger('click');
          return false;
      });
   
      $('*').bind('keydown', 'Ctrl+x', function assets() {
         $('#btn_cancel').trigger('click');
          return false;
      });
   
     $('*').bind('keydown', 'Ctrl+d', function assets() {
         $('.btn_save_back').trigger('click');
          return false;
      });
       
   }
   
   jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Crud
      <small><?= cclang('new', ['Crud']);  ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> <?= cclang('home');  ?></a></li>
      <li class=""><a  href="<?= site_url('administrator/crud'); ?>">Crud</a></li>
      <li class="active"><?= cclang('new');  ?></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="Crud Avatar">
                     </div>
                     <!-- /.widget-crud-image -->
                     <h3 class="widget-user-username">Crud</h3>
                     <h5 class="widget-user-desc"><?= cclang('new', ['Crud']);  ?></h5>
                     <hr>
                  </div>
                  <?= form_open('', [
                     'name'    => 'form_crud', 
                     'class'   => 'form-horizontal', 
                     'id'      => 'form_crud', 
                     'method'  => 'POST'
                     ]); ?>
                  <div class="form-group ">
                     <label for="table_name" class="col-sm-2 control-label"><?= cclang('table_name') ?> <i class="required">*</i></label>
                     <div class="col-sm-8">
                        <select  class="form-control chosen chosen-select chosen-select-with-deselect" name="table_name" id="table_name" tabi-ndex="5" data-placeholder="Select Table" >
                           <option value=""></option>
                           <?php foreach ($tables as $row): ?>
                           <option value="<?= $row; ?>"><?= $row; ?></option>
                           <?php endforeach; ?>  
                        </select>
                        <small class="info help-block">
                        <?= cclang('table_is_being_for_generate'); ?>
                        </small>
                        <span class="loading2 loading-hide"><img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> <i><?= cclang('loading_field_data'); ?></i></span>

                     </div>
                  </div>
                  <div class="form-group ">
                     <label for="label" class="col-sm-2 control-label"><?= cclang('subject') ?> <i class="required">*</i></label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="<?= set_value('subject'); ?>">
                        <small class="info help-block">The subject of crud.</small>
                     </div>
                  </div>
                  <div class="form-group ">
                     <label for="label" class="col-sm-2 control-label"><?= cclang('title') ?> </label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?= set_value('title'); ?>">
                        <small class="info help-block">The title of crud.</small>
                     </div>
                  </div>
                  <div class="form-group ">
                     <label for="label" class="col-sm-2 control-label"><?= cclang('page') ?></label>
                     <div class="col-sm-7">
                        <div class="col-xs-3">
                          <label>
                            <input class="flat-red check page_create" type="checkbox" id="create" value="yes" name="create" checked> <?= cclang('create'); ?> 
                          </label>
                        </div>
                        <div class="col-xs-3">
                          <label>
                            <input class="flat-red check page_read" type="checkbox" id="read" value="yes" name="read" checked> <?= cclang('read'); ?>  
                          </label>
                        </div>
                        <div class="col-xs-3">
                          <label>
                            <input class="flat-red check page_update" type="checkbox" id="update" value="yes" name="update" checked> <?= cclang('update'); ?> 
                          </label>
                        </div>
			<div class="col-xs-3">
                          <label>
                            <input class="flat-red check page_update" type="checkbox" id="user_restriction" value="yes" name="user_restriction"> User Restriction
                          </label>
                        </div>
                     </div>
                  </div>

                  <hr>
                  <div class="wrapper-crud">
                    
                  </div>
                  <div class="validation_rules" style="display: none">
                     <option value="" class="<?= $this->model_crud->get_input_type(); ?>"></option>
                     <?php foreach (db_get_all_data('crud_input_validation') as $input): ?>
                       <option value="<?= $input->validation; ?>" class="<?= str_replace(',', ' ', $input->group_input); ?>" title="<?= $input->input_able; ?>" data-placeholder="<?= $input->input_placeholder; ?>" ><?= ucwords(clean_snake_case($input->validation)); ?></option>
                      <?php endforeach; ?> 
                  </div>
                  <div class="message no-message-padding">
                  </div>
                  <div class="view-nav">
                     <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button') ?> (Ctrl+s)"><i class="fa fa-save" ></i> <?= cclang('save_button'); ?></button>
                     <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)"><i class="ion ion-ios-list-outline" ></i> <?= cclang('save_and_go_the_list_button'); ?></a>
                     <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)"><i class="fa fa-undo" ></i> <?= cclang('cancel_button'); ?></a>
                     <span class="loading loading-hide"><img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> <i><?= cclang('loading_saving_data'); ?></i></span>
                  </div>
                  <?= form_close(); ?>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>

</section>
<script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>
<script src="<?= BASE_ASSET; ?>js/crud.js"></script>
<!-- Page script -->
<script>
$(document).ready(function() {
    $('#table_name').val('').trigger('chosen:updated');

    $('.btn_save').click(function() {
        $('.message').hide();

        var form_crud = $('#form_crud');
        var data_post = form_crud.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});

        $('.loading').show();

        $.ajax({
                url: BASE_URL + '/administrator/crud/add_save',
                type: 'POST',
                dataType: 'json',
                data: data_post,
            })
            .done(function(res) {
                if (res.success) {

                    if (save_type == 'back') {
                        window.location.href = res.redirect;
                        return;
                    }

                    $('.message').printMessage({
                        message: res.message
                    });
                    $('.message').fadeIn();

                } else {
                    $('.message').printMessage({
                        message: res.message,
                        type: 'warning'
                    });
                    $('.message').fadeIn();
                }

            })
            .fail(function(XMLHttpRequest, textStatus, errorThrown) {
		console.log(XMLHttpRequest.responseText);
                $('.message').printMessage({
                    message: 'Error save data',
                    type: 'warning'
                });
            })
            .always(function() {
                $('.loading').hide();
                $('html, body').animate({
                    scrollTop: $(document).height()
                }, 3000);
            });

        return false;
    }); /*end btn save*/

    $('#table_name').on('change', function() {
        var table = $(this).val();
        $('.loading2').show();
        $.ajax({
                url: BASE_URL + '/administrator/crud/get_field_data/' + table,
                type: 'GET',
                dataType: 'JSON',
            })
            .done(function(res) {
                if (res.success) {

                    $('#subject, #title').val(res.subject);
                    $('.wrapper-crud').html(res.html);
                    var config = {
                        '.chosen-select': {},
                        '.chosen-select-deselect': {
                            allow_single_deselect: true
                        },
                        '.chosen-select-no-single': {
                            disable_search_threshold: 10
                        },
                        '.chosen-select-no-results': {
                            no_results_text: 'Oops, nothing found!'
                        },
                        '.chosen-select-width': {
                            width: "95%"
                        }
                    }
                    for (var selector in config) {
                        $(document).find(selector).chosen(config[selector]);
                    }
                    $(document).find('.tip').tooltip();
                    //Make diagnosis table sortable
                    $(document).find("#diagnosis_list tbody").sortable({
                        helper: fixHelperModified,
                        handle: 'td:first',
                        start: function() {
                            $(this).addClass('target-area');
                        },
                        stop: function(event, ui) {
                            renumber_table('#diagnosis_list');
                        }
                    });

                    //check all
                    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                        checkboxClass: 'icheckbox_minimal-red',
                        radioClass: 'iradio_minimal-red'
                    });

                    $(document).find("#diagnosis_list tbody").sortable({
                        helper: fixHelperModified,
                        stop: function(event, ui) {
                            renumber_table('#diagnosis_list')
                        }
                    });

                    /*update validation*/
                    $(document).find('table tr .input_type').each(function() {
                        updateValidation($(this));
                    });

                    /*frezee thead row*/
                    $(document).find('table#diagnosis_list').floatThead({
                        useAbsolutePositioning: true,
                    });

                    /*added devfault validation rules*/
                    $(document).find('table tr .validation').each(function() {

                        var parent = $(this).parents('tr');
                        var id = parent.find('#crud-id').val();
                        var name = parent.find('#crud-name').val();
                        var data_type = parent.find('#crud-data-type').val();
                        var primarykey = parent.find('#crud-primarykey').val();
                        var max_length = parent.find('#crud-max-length').val();

                        if (primarykey != 1) {
                            addValidation($(this), id, name, 'required', 'no');

                            if (max_length != 0) {
                                addValidation($(this), id, name, 'max_length', 'yes', max_length);
                            }
                        }

                        if (data_type == 'number') {
                            addValidation($(this), id, name, 'number', 'no');
                        }

                    });

                } /*end response success*/

            })
            .fail(function(xhr, ajaxOptions, thrownError) {
		console.log(xhr.status);
        console.log(thrownError);

                $('.message').printMessage({
                    message: 'Error getting data',
                    type: 'warning'
                });
            })
            .always(function() {
                $('.loading2').hide();
            });

    });

    //Helper function to keep table row from collapsing when being sorted
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });
        return $helper;
    };

    //Renumber table rows
    function renumber_table(tableID) {
        $(tableID + " tr").each(function() {
            count = $(this).parent().children().index($(this)) + 1;
            $(this).find('.priority').val(count);
        });
    }

}); /*end doc ready*/
</script>