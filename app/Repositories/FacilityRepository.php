<?php

namespace App\Repositories;

use App\Models\FacilityModel;

/**
 * Class FacilityModel
 * @package App\Repositories
 * @author Richard Guevara
 */
class FacilityRepository
{
    /**
     * Get all instances
     *
     * @return App/Models/FacilityModel;
     */
    public function showAllfacility()
    {
        $facility = FacilityModel::where('deleted',0)->get();
        return $facility;
    }

    public function facilityEdit($id)
    {

        $facility = FacilityModel::where('id',$id)
        ->where('deleted',0)
        ->first();

        return $facility;
    }

    public function storeFacility($dataFacility)
    {
        $codepic = strtoupper(str_random(6));
        $facPic = time().'.'.$dataFacility->photo->getClientOriginalExtension();
        $moveFacpic = $codepic."-".$facPic;
        $dataFacility->photo->move(public_path('images/facility'), $moveFacpic);

        $storeFacility = FacilityModel::create([
            'title' => $dataFacility->title,
            'description' => $dataFacility->description,
            'content' => $dataFacility->content,
            'photo' => "images/facility/".$moveFacpic,
            'created_by' => auth()->user()->id
        ]);

        return $storeFacility;
    }


    public function updateFacility($dataFacility, $id)
    {
    

        if ($dataFacility->photo != NULL) {

            $codepic = strtoupper(str_random(6));
            $facPic = time().'.'.$dataFacility->photo->getClientOriginalExtension();
            $moveFacpic = $codepic."-".$facPic;
            $dataFacility->photo->move(public_path('images/facility'), $moveFacpic);

            $facility = FacilityModel::where('id', $id)
                ->update([
                    'title' => $dataFacility->title,
                    'description' => $dataFacility->description,
                    'content' => $dataFacility->content,
                    'photo' => "images/facility/".$moveFacpic
                ]);
            
        } else {

            $facility = FacilityModel::where('id', $id)
                ->update([
                    'title' => $dataFacility->title,
                    'description' => $dataFacility->description,
                    'content' => $dataFacility->content
                ]);

        }
        
        return $facility;
    }

    public function deleteFacility($dataFacility)
    {
        $facility = FacilityModel::where('id', $dataFacility->id)
            ->update([
            'deleted' => 1,
        ]);
        return $facility;
    }
}