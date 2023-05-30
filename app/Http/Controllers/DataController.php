<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataRequest;
use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        return view('pages.home', [
            'data' => Data::all()
        ]);
    }

    public function store(DataRequest $request)
    {
        Data::create($request->all());
        return redirect()->route('home')->with('info', 'Data Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        Data::destroy($id);
        return redirect()->route('home')->with('info', 'Data Berhasil Dihapus');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'forecast' => 'required'
        ]);

        $data = Data::all();
        $arr = [];
        $a = 0;
        $b = 0;
        $result = 0;

        $xAverage = $data->sum('x') / $data->count();
        $yAverage = $data->sum('y') / $data->count();

        foreach ($data as $key => $value) {
            $arr[$key]['X'] = $value->x;
            $arr[$key]['Y'] = $value->y;
            $arr[$key]['x'] = $value->x - $xAverage;
            $arr[$key]['y'] = $value->y - $yAverage;
            $arr[$key]['xy'] = ($value->x - $xAverage) * ($value->y - $yAverage);
            $arr[$key]['x2'] = pow($value->x - $xAverage, 2);
        }

        $b = array_sum(array_column($arr, 'xy')) / array_sum(array_column($arr, 'x2'));
        $a = $yAverage - ($b * $xAverage);

        $result = $a + ($b * $request->forecast);

        return view('pages.result', [
            'data' => $arr,
            'a' => $a,
            'b' => $b,
            'X' => $request->forecast,
            'result' => $result
        ]);

    }
}
