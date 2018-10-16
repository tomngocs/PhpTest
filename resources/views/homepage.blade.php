<!DOCTYPE html>
<html>
<head>
	<title>PHP Test</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			fetch_stock_data(); // 
			/*
			*	The function helps return data in Stock table
			*   (if dataQuery is not blank, the function returns some
			*    data and display on browser).
			*/
		  	function fetch_stock_data(dataQuery = '')
		  	{
			    $.ajax({
			    	// Request is sent to method searchDB in route "db_search"
			      	url:"{{ route('db_search.searchDB') }}",
			      	method:'GET', 
			      	data:{dataQuery:dataQuery},
			      	dataType:'json', // Data received in JSON type
			      	/*
			      	*	This funnction will call if request is received successfully
			      	*/
			      	success:function(data)
			      	{
			      		// Display data in "tbody" html element.
			        	$('tbody').html(data.stock_data); 
			        	$('#total_records').text(data.total);
			      	}
			    })
		  	}


		  	$(document).on('keyup', '#search', function(){
		    	var dataQuery = $(this).val();
		    	fetch_stock_data(dataQuery);
		  	});
		});
	</script>
</head>
<body>
	<div class="container box">
		<h1 align="center" style="color: blue">PHP Laravel Search Test</h1><br />
		<div class="panel panel-default">
			<div class="panel-heading" style="color: blue; font-weight: bold">Search by any data fields</div>
			<div class="panel-body">
				<div class="form-group">
					<input type="text" name="search" id="search" class="form-control" placeholder="Enter your data" />
				</div>
				<div class="table-responsive">
					<br /><hr /><br />
					<h5 style="color: blue">Number of rows : <span id="total_records" style="color: red"></span></h5>
          			<table class="table table-striped table-bordered">
          				<thead style="color: red">
              				<tr>
              					<th>Name</th>
				                <th>Price</th>
				                <th>Bedrooms</th>
				                <th>Bathrooms</th>
				                <th>Storeys</th>
				                <th>Garages</th>
				            </tr>
				        </thead>
            			<tbody></tbody>
            		</table>
        		</div>
      		</div>    
    	</div>
  	</div>
</body>
</html>

