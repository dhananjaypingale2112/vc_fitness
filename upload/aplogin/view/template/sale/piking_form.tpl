<?php echo $header; ?><?php echo $column_left; ?>

<div id="content">
  <div class="page-header">
    <div class="container-fluid">
	
	 <div class="panel-body">
        <div class="well">
          <div class="row">
            <div class="col-sm-4">
              
			  <div class="form-group">
                <label class="control-label" for="input-batch"><?php echo "Shipping Time"; ?></label>
				<select name="filter_batch" id="input-batch" class="form-control">
                  <option value=""></option>
                  <?php foreach ($shipping_batches as $shipping_batch) { ?>
                  <?php if ($shipping_batch['batch_id'] == $filter_batch) { ?>
                  <option value="<?php echo $shipping_batch['batch_id']; ?>" selected="selected"><?php echo $shipping_batch['batch_name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $shipping_batch['batch_id']; ?>"><?php echo $shipping_batch['batch_name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </div>
            </div>
            
            <div class="col-sm-4">
              <div class="form-group">
                <label class="control-label" for="input-date-added"><?php echo "Order Date"; ?></label>
                <div class="input-group date">
                  <input type="text" name="filter_date_added" value="<?php echo $filter_date_added; ?>" placeholder="<?php echo "Date"; ?>" data-date-format="YYYY-MM-DD" id="input-date-added" class="form-control" />
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                  </span>
				 
				  </div>
				  
              </div>
			  
            </div>
			
			<div class="col-sm-4">
              
			  <div class="form-group">
                <label class="control-label" for="input-batch"><?php echo "Filter"; ?></label>
				 <span >
				  <button type="button" id="button-filter" class="btn btn-primary pull-right form-control"><i class="fa fa-search"></i> <?php echo "Filter"; ?></button></span>
              </div>
            </div>
			  
			  
            
            
          </div>
		  
        </div>
	
	  
	
      <div class="pull-right"><a href="<?php echo $print; ?>" target="_blank" data-toggle="tooltip" title="<?php echo "Print Piking List "; ?>" class="btn btn-info"><i class="fa fa-print"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-bar-chart"></i> <?php echo $text_list; ?></h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
        	

          <table class="table table-bordered">
            <thead>
              <tr>
                <td class="text-left"><?php echo $column_name; ?></td>
                <td class="text-left"><?php echo $column_qty; ?></td>
                <td class="text-left"><?php echo $column_model; ?></td>
                <td class="text-right"><?php echo $column_price; ?></td>
				<td class="text-right"><?php echo "Shipping Time"; ?></td>
                <td class="text-right"><?php echo $column_status; ?></td>
              </tr>
            </thead>
            <tbody>
              <?php if ($products) { ?>
              <?php foreach ($products as $product) { ?>
              <tr>
                <td class="text-left"><?php echo $product['product_name']; ?></td>
                <td class="text-right"><?php echo $product['qty']; ?></td>
                <td class="text-left"><?php echo $product['model']; ?></td>
                <td class="text-right"><?php echo $product['price']; ?></td>
				<td class="text-right"><?php echo $product['batch_name']; ?></td>
                <td class="text-right"><?php echo $product['name']; ?></td>
              </tr>
              <?php } ?>
              <?php } else { ?>
              <tr>
                <td class="text-center" colspan="4"><?php echo $text_no_results; ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
          <div class="col-sm-6 text-right"><?php echo $results; ?></div>
        </div>
      </div>
    </div>
  </div>
</div>

 <script type="text/javascript"><!--
$('#button-filter').on('click', function() {
	url = 'index.php?route=sale/productpiking&token=<?php echo $token; ?>';

	 
	
	var filter_batch = $('select[name=\'filter_batch\']').val();

	if (filter_batch) {
		url += '&filter_batch=' + encodeURIComponent(filter_batch);
	}

	var filter_order_status = $('select[name=\'filter_order_status\']').val();

	if (filter_order_status != '*') {
		url += '&filter_order_status=' + encodeURIComponent(filter_order_status);
	}

 
	var filter_date_added = $('input[name=\'filter_date_added\']').val();

	if (filter_date_added) {
		url += '&filter_date_added=' + encodeURIComponent(filter_date_added);
	}
 

	location = url;
});

//--></script>
  
  <script src="view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
  <link href="view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" media="screen" />
  <script type="text/javascript"><!--
$('.date').datetimepicker({
	pickTime: false
});
//--></script>

<?php echo $footer; ?>