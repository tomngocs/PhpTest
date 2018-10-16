<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DbSearch extends Controller
{
    public function getHome()
    {
    	return view('homepage');
    }
    public function searchDB(Request $request)
    {
    	if($request->ajax())
		{
			$display = '';
			$query = $request->get('query');
			if($query != '')
			{
			$obj = DB::table('stock')
				->where('Name', 'like', '%'.$query.'%')
				->orWhere('Price', '=', '%'.$query.'%')
				->orWhere('Bedrooms', '=', '%'.$query.'%')
				->orWhere('Bathrooms', '=', '%'.$query.'%')
				->orWhere('Storeys', '=', '%'.$query.'%')
				->orWhere('Garages', '=', '%'.$query.'%')
				->get();
		}else{
			$obj = DB::table('stock')->get();
		}
		$total = $obj->count();
		if($total > 0)
		{
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
			'stock_data'  => $display,
			'total'  => $total
       	);
       	echo json_encode($obj);
    }
}
