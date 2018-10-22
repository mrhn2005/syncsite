<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class StoryForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('author', 'text', [
                'label'=>'نویسنده:',
            ])
            ->add('subject', 'text', [
                'label'=>'موضوع',
                'rules' => 'required'
            ])
            ->add('body', 'textarea', [
                'label'=>'متن اصلی:',
                'attr' => ['class' => 'form-control my-editor'],
                
            ])
            ->add('sbody', 'textarea', [
                'label'=>'متن کوتاه',
                'attr' => ['rows' =>'3'],
                'rules' => 'required'
            ])
            ->add('tags', 'text', [
                'label'=>'برچسبها',
                'value' => '',
                'attr' => ['id' => 'tags'],
               
            ])
            ->add('link', 'text', [
                'label'=>'لینک خرید',
            ])
            ->add('photo', 'file', [
                'label'=>'تصویراصلی',
                'attr' => ['class' => '','accept'=>'image/*'],
                'rules' => ''
            ])
            ->add('submit', 'submit', [
                'label'=>'تایید',
                'attr' => ['class' => 'form-control btn btn-primary'],
            ]);
    }
}
