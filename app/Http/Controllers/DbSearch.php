<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

/**
*
*	DbSearch is a Controller helping manage request, get query or redirect
*/
class DbSearch extends Controller
{
	/**
	*	This function helps to return to view
	*	for displaying onto browser
	*/
    public function getHome()
    {
    	return view('homepage');
    }
    
    /**
	*	Search specific data in database from request
	*/
    public function searchDB(Request $request)
    {
    	if($request->ajax())
		{
			$display = '';
			$sql = $request->get('dataQuery');
			if($sql != '')
			{
				// Select data in "stock" table with condition if we have a query received
				$obj = DB::table('stock')
					->where('Name', 'like', '%'.$sql.'%')
					->orWhere('Price', '=', $sql)
					->orWhere('Bedrooms', '=', $sql)
					->orWhere('Bathrooms', '=', $sql)
					->orWhere('Storeys', '=', $sql)
					->orWhere('Garages', '=', $sql)
					->get();
			}else{
				// Select all data in "stock" table if there are no queries received
				$obj = DB::table('stock')->get();
			}
			$total = $obj->count(); // Count all the objects received
			if($total > 0)
			{
				// Display all data received if there are data corresponding to search field
				foreach($obj as $row)
				{
					$display .= '
								<tr>
									<td>'.$row->Name.'</td>
									<td>'.$row->Price.'</td>
									<td>'.$row->Bedrooms.'</td>
									<td>'.$row->Bathrooms.'</td>
									<td>'.$row->Storeys.'</td>
									<td>'.$row->Garages.'</td>
								</tr>
								';
				}
			}else{
				$display = '
							<tr>
							<td align="center" colspan="6">There are no data from your Search</td>
							</tr>
							';
			}
			$obj = array(
				'stock_data' => $display,
				'total'  => $total
	       	);
	       	echo json_encode($obj); // To send JSON type data received to ajax request
    	}
    }
}
