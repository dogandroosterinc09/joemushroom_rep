<?php

namespace App\Repositories;

use App\Models\FaqsModel;

/**
 * Class FaqsModel
 * @package App\Repositories
 * @author Richard Guevara
 */
class FaqsRepository
{
    /**
     * Get all instances
     *
     * @return App/Models/FaqsModel;
     */
    public function showAllfaqs()
    {
        $faqs = FaqsModel::where('deleted',0)->get();
        return $faqs;
    }

    public function faqsEdit($id)
    {

        $faqs = FaqsModel::where('id',$id)
        ->where('deleted',0)
        ->first();

        return $faqs;
    }

    public function storeFaqs($dataFaqs)
    {
        $codepic = strtoupper(str_random(6));
        $faqsPic = time().'.'.$dataFaqs->photo->getClientOriginalExtension();
        $moveFaqspic = $codepic."-".$faqsPic;
        $dataFaqs->photo->move(public_path('images/faqs'), $moveFaqspic);

        $storeFaqs = FaqsModel::create([
            'title' => $dataFaqs->title,
            'description' => $dataFaqs->description,
            'content' => $dataFaqs->content,
            'photo' => "images/faqs/".$moveFaqspic,
            'created_by' => auth()->user()->id
        ]);

        return $storeFaqs;
    }


    public function updateFaqs($dataFaqs, $id)
    {
        if ($dataFaqs->photo != NULL) {

            $codepic = strtoupper(str_random(6));
            $faqsPic = time().'.'.$dataFaqs->photo->getClientOriginalExtension();
            $moveFaqspic = $codepic."-".$faqsPic;
            $dataFaqs->photo->move(public_path('images/faqs'), $moveFaqspic);

            $faqs = FaqsModel::where('id', $id)
                ->update([
                    'title' => $dataFaqs->title,
                    'description' => $dataFaqs->description,
                    'content' => $dataFaqs->content,
                    'photo' => "images/faqs/".$moveFaqspic
                ]);
            
        } else {

            $faqs = FaqsModel::where('id', $id)
                ->update([
                    'title' => $dataFaqs->title,
                    'description' => $dataFaqs->description,
                    'content' => $dataFaqs->content,
                ]);

        }
        
        return $faqs;
    }

    public function deleteFaqs($dataFaqs)
    {
        $faqs = FaqsModel::where('id', $dataFaqs->id)
            ->update([
            'deleted' => 1,
        ]);
        return $faqs;
    }
}