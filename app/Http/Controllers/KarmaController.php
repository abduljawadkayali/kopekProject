<?php

namespace App\Http\Controllers;

use App\Food;
use App\Karma;
use App\KarmaFood;
use App\KarmaSpecificValue;
use Illuminate\Http\Request;

class KarmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Karma = Karma::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        return view('karma.index', compact('Karma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Food = Food::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        return view('karma.create', compact('Food'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    =>  'required'
        ]);
        $karma = new Karma();
        $karma->name = $request->name;
        $karma->user_id = auth()->user()->id;
        $karma->save();
        $values = $request->food;
        $Foods_id = $request->food_id;
        $KarmaSpecific = array_fill(0, 15, 0);
        $i=0;
        foreach ($Foods_id as $food) {
            if($values[$i])
            {
                $KarmaFood = new KarmaFood();
                $KarmaFood->food_id = $food;
                $KarmaFood->food_amount = $values[$i];
                $KarmaFood->karma_id = $karma->id;
                $KarmaFood->save();
                $specifics = $KarmaFood->Food->Relation->pluck("food_specific_id");
                $specificsValues = $KarmaFood->Food->Relation->pluck("specific_value");
                $k=0;
                for ($j = 0; $j < 15;)
                {
                    if ($specifics->count() > $k)
                    {
                        if ($specifics[$k] == $j+1){
                            if ($k ==8){
                                if ($specificsValues[7] !=0)
                                {
                                    $KarmaSpecific[8] =$KarmaSpecific[8] + $specificsValues[6]/$specificsValues[7];
                                }
                            }
                            else{
                                $KarmaSpecific[$j] =$KarmaSpecific[$j]+ $specificsValues[$k] * $values[$i];
                            }
                            $k =$k+1;
                        }
                        else{
                        }
                    }
                    else{
                        $j=20;
                    }
                    $j =$j+1;
                }
                $KarmaSpecific[8] =$KarmaSpecific[8] +  $KarmaSpecific[6]/$KarmaSpecific[7];
            }
            $i++;
        }
        $karmaSpecificValue = new KarmaSpecificValue();
        $karmaSpecificValue->karma_id = $karma->id;
        $karmaSpecificValue->Km =10 * $KarmaSpecific[0];
        $karmaSpecificValue->Hp =10 * $KarmaSpecific[1];
        $karmaSpecificValue->Enerji =1000 * $KarmaSpecific[2];
        $karmaSpecificValue->Lif =10 * $KarmaSpecific[3];
        $karmaSpecificValue->Kul = 10 * $KarmaSpecific[4];
        $karmaSpecificValue->Karbonhidrat =10 * $KarmaSpecific[5];
        $karmaSpecificValue->Kalsiyum =10 *$KarmaSpecific[6];
        $karmaSpecificValue->Fosfor =10 * $KarmaSpecific[7];
        $karmaSpecificValue->Ca_p = $KarmaSpecific[8];
        $karmaSpecificValue->Meganizyum =10000* $KarmaSpecific[9];
        $karmaSpecificValue->Sodyum =10000* $KarmaSpecific[10];
        $karmaSpecificValue->Taurin =10* $KarmaSpecific[11];
        $karmaSpecificValue->Yag = 10*$KarmaSpecific[12];
        $karmaSpecificValue->LinoliekAsit =10 * $KarmaSpecific[13];
        $karmaSpecificValue->Fiyat = $KarmaSpecific[14];
        $karmaSpecificValue->save();
        toast(__('Mixture Added Successfully'),'success');
        return redirect()->route('karma.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Food = Food::where('user_id', 1)->orWhere('user_id', auth()->user()->id)->get();
        $data = Karma::findOrFail($id);
        if(auth()->user()->id == 1 || auth()->user()->id == $data->user_id)
        {
            return view('karma.edit', compact('data' , 'Food'));
        }
        else
        {
            toast(__("You can't Update this Mixture It's Public Please Create New One for You"),'error');
            return redirect()->route('karma.create');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $KarmaFoods = KarmaFood::where('karma_id',$id)->get();
        $KarmaSpecific = KarmaSpecificValue::where('karma_id',$id);
        $KarmaSpecific->delete();
        foreach ($KarmaFoods as $KarmaFood)
        {
            $KarmaFood->delete();
        }
        $request->validate([
            'name'    =>  'required'
        ]);
        $karma = Karma::findOrFail($id);
        $karma->name = $request->name;
        $karma->user_id = auth()->user()->id;
        $karma->save();
        $values = $request->food;
        $Foods_id = $request->food_id;
        $KarmaSpecific = array_fill(0, 15, 0);
        $i=0;
        foreach ($Foods_id as $food) {
            if($values[$i])
            {
                $KarmaFood = new KarmaFood();
                $KarmaFood->food_id = $food;
                $KarmaFood->food_amount = $values[$i];
                $KarmaFood->karma_id = $karma->id;
                $KarmaFood->save();
                $specifics = $KarmaFood->Food->Relation->pluck("food_specific_id");
                $specificsValues = $KarmaFood->Food->Relation->pluck("specific_value");
                $k=0;
                for ($j = 0; $j < 15;)
                {
                    if ($specifics->count() > $k)
                    {
                        if ($specifics[$k] == $j+1){
                            if ($k ==8){
                                if ($specificsValues[7] !=0)
                                {
                                    $KarmaSpecific[8] =$KarmaSpecific[8] + $specificsValues[6]/$specificsValues[7];
                                }
                            }
                            else{
                                $KarmaSpecific[$j] =$KarmaSpecific[$j]+ $specificsValues[$k] * $values[$i];
                            }
                            $k =$k+1;
                        }
                        else{
                        }
                    }
                    else{
                        $j=20;
                    }
                    $j =$j+1;
                }
                $KarmaSpecific[8] =$KarmaSpecific[8] +  $KarmaSpecific[6]/$KarmaSpecific[7];
            }
            $i++;
        }
        $karmaSpecificValue = new KarmaSpecificValue();
        $karmaSpecificValue->karma_id = $karma->id;
        $karmaSpecificValue->Km =10 * $KarmaSpecific[0];
        $karmaSpecificValue->Hp =10 * $KarmaSpecific[1];
        $karmaSpecificValue->Enerji =1000 * $KarmaSpecific[2];
        $karmaSpecificValue->Lif =10 * $KarmaSpecific[3];
        $karmaSpecificValue->Kul = 10 * $KarmaSpecific[4];
        $karmaSpecificValue->Karbonhidrat =10 * $KarmaSpecific[5];
        $karmaSpecificValue->Kalsiyum =10 *$KarmaSpecific[6];
        $karmaSpecificValue->Fosfor =10 * $KarmaSpecific[7];
        $karmaSpecificValue->Ca_p = $KarmaSpecific[8];
        $karmaSpecificValue->Meganizyum =10000* $KarmaSpecific[9];
        $karmaSpecificValue->Sodyum =10000* $KarmaSpecific[10];
        $karmaSpecificValue->Taurin =10* $KarmaSpecific[11];
        $karmaSpecificValue->Yag = 10*$KarmaSpecific[12];
        $karmaSpecificValue->LinoliekAsit =10 * $KarmaSpecific[13];
        $karmaSpecificValue->Fiyat = $KarmaSpecific[14];
        $karmaSpecificValue->save();
        toast(__('Mixture Updated Successfully'),'success');
        return redirect()->route('karma.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karma = Karma::findOrFail($id);
        $karma->delete();
        $KarmaFoods = KarmaFood::where('karma_id',$id)->get();
        $KarmaSpecific = KarmaSpecificValue::where('karma_id',$id);
        $KarmaSpecific->delete();
        foreach ($KarmaFoods as $KarmaFood)
        {
            $KarmaFood->delete();
        }
        toast(__('Mixture Deleted Successfully'),'info');
        return redirect()->route('karma.index');
    }
}
