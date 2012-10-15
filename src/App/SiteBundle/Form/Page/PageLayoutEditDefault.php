<?php
namespace App\SiteBundle\Form\Page;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PageLayoutEditDefault extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add(
            'metaTitle',
            'text',
            array(
                'label' => 'Meta Title',
                'required' => false,
                'attr' => array(
                    "size" => '50'
                )
            )
        );
        $builder->add(
            'metaDescription',
            'text',
            array(
                'label' => 'Meta Description',
                'required' => false,
                'attr' => array(
                    "size" => '100'
                )
            )
        );
        $builder->add(
            'metaKeywords',
            'text',
            array(
                'label' => 'Meta Keywords',
                'required' => false,
                'attr' => array(
                    "size" => '100'
                )
            )
        );
    }

    public function getName() {
        return 'PageLayoutEditDefault';
    }

}
