
<?php
        $query_string = $_SERVER['QUERY_STRING'];
?>

<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
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

function goBack() {
    window.history.back();
}

</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Event Equipment Checklist        <small><?= cclang('new', ['Event Equipment Checklist']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/event_equipment_checklist?'.$query_string); ?>">Event Equipment Checklist</a></li>
        <li class="active"><?= cclang('new'); ?></li>
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
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Event Equipment Checklist</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Event Equipment Checklist']); ?></h5>
                            <hr>
                        </div>

			<div class="widget-user-header ">
                                <ul class="nav nav-pills">

			
				<?php 
					if(!empty($_GET)){
				?>
                                
				<?php
					}
				?>

                			<?php if(!empty($_GET['go_back'])) { ?>
                                        <a class="btn btn-sm btn-success" href="#" onclick="goBack()"><?= $_GET['go_back']; ?></a>
                                <?php } ?>
                                 </ul>
                        </div>

                        <?= form_open('', [
                            'name'    => 'form_event_equipment_checklist', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_event_equipment_checklist', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                 

			<?php 
				if(!empty($_GET['event_id'])){
			?>
				<input type="hidden" name="event_id" id="event_id" value="<?= $_GET['event_id'] ?>" >
			 <?php
				} else {
			?>
			
			<div class="form-group ">
                            <label for="event_id" class="col-sm-2 control-label">Event Id 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="event_id" id="event_id" data-placeholder="Select Event Id" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('events') as $row): ?>
                                    <option value="<?= $row->id ?>"><?= $row->event_name; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input Event Id</b> Max Length : 11.</small>
                            </div>
                        </div>
			<?php } ?>
                                                 
                                                 

			<?php 
				if(!empty($_GET['equipment_id'])){
			?>
				<input type="hidden" name="equipment_id" id="equipment_id" value="<?= $_GET['equipment_id'] ?>" >
			 <?php
				} else {
			?>
			
			<div class="form-group ">
                            <label for="equipment_id" class="col-sm-2 control-label">Equipment Id 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="equipment_id" id="equipment_id" data-placeholder="Select Equipment Id" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('equipments') as $row): ?>
                                    <option value="<?= $row->id ?>"><?= $row->equipment_name; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input Equipment Id</b> Max Length : 11.</small>
                            </div>
                        </div>
			<?php } ?>
                                                
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                           <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                            <i class="fa fa-undo" ></i> <?= cclang('cancel_button'); ?>
                            </a>
                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
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
<!-- /.content -->
<!-- Page script -->
<script>
    $(document).ready(function(){
                   
      $('#btn_cancel').click(function(){
        swal({
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
              window.location.href = BASE_URL + 'administrator/event_equipment_checklist';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_event_equipment_checklist = $('#form_event_equipment_checklist');
        var data_post = form_event_equipment_checklist.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/event_equipment_checklist/add_save',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            

		redirect_forced = '';
		 
	
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();

            $('.chosen option').prop('selected', false).trigger('chosen:updated');
                
          } else {
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function(XMLHttpRequest, textStatus, errorThrown) {
	  console.log(XMLHttpRequest.responseText);
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
       
 
       
    
    
    }); /*end doc ready*/
</script>
