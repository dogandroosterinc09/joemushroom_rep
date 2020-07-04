<?php

namespace App\Repositories;

use App\Models\TeamMember;

/**
 * Class ArchiveHomeImagesRepository
 * @package App\Repositories
 * @author Richard Guevara
 */
class TeamRepository
{
    /**
     * Get all instances
     *
     * @return App/Models/TeamMember;
     */
    public function showAllmember()
    {
        $member = TeamMember::where('deleted',0)->get();
        return $member;
    }

    public function teamEdit($id)
    {

        $member = TeamMember::where('id',$id)
        ->where('deleted',0)
        ->first();

        return $member;
    }

    public function storeTeam($dataTeam)
    {
        $codepic = strtoupper(str_random(6));
        $memPic = time().'.'.$dataTeam->memPic->getClientOriginalExtension();
        $moveMempic = $codepic."-".$memPic;
        $dataTeam->memPic->move(public_path('images/team'), $moveMempic);

        $storeTeam = TeamMember::create([
            'memFname' => $dataTeam->memFname,
            'memLname' => $dataTeam->memLname,
            'memPosition' => $dataTeam->memPosition,
            'memBio' => $dataTeam->memBio,
            'memPic'  => "images/team/".$moveMempic,
            'memFile' => "NONE",
            'created_by' => auth()->user()->id
        ]);

        return $storeTeam;
    }


    public function updateTeam($dataTeam, $id)
    {
    

        if ($dataTeam->memPic != NULL) {

            $codepic = strtoupper(str_random(6));
            $memPic = time().'.'.$dataTeam->memPic->getClientOriginalExtension();
            $moveMempic = $codepic."-".$memPic;
            $dataTeam->memPic->move(public_path('images/team/'), $moveMempic);

            $member = TeamMember::where('id', $id)
                ->update([
                    'memFname' => $dataTeam->memFname,
                    'memLname' => $dataTeam->memLname,
                    'memPosition' => $dataTeam->memPosition,
                    'memBio' => $dataTeam->memBio,
                    'memPic'  => "images/team/".$moveMempic
                ]);
            
        } else {

            $member = TeamMember::where('id', $id)
                ->update([
                    'memFname' => $dataTeam->memFname,
                    'memLname' => $dataTeam->memLname,
                    'memPosition' => $dataTeam->memPosition,
                    'memBio' => $dataTeam->memBio
                ]);

        }

        
        return $member;
    }

    public function deleteTeam($dataTeam)
    {
        $member = TeamMember::where('id', $dataTeam->id)
            ->update([
            'deleted' => 1,
        ]);
        return $member;
    }
}