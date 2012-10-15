<?php
namespace App\SiteBundle\Form\Block;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class News extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add(
            'html',
            'textarea',
            array(
                'label' => 'HTML code',
                'required' => false,
                'attr' => array(
                    "rows" => '30',
                    'cols' => '120',
                    'class' => 'kit-cms-advanced'
                )
            )
        );

        $builder->add(
            'date',
            'date'
        );

        $builder->add(
            'title',
            'text',
            array(
                'required' => false,
                'attr' => array(
                    "size" => "50"
                )
            )
        );
        $builder->add(
            'shortContent',
            'textarea',
            array(
                'required' => false,
                'attr' => array(
                    "class" => "kit-cms-rte-simple"
                )
            )
        );

        $builder->add(
            'mainContent',
            'textarea',
            array(
                'required' => false,
                'attr' => array(
                    "class" => "kit-cms-rte-simple"
                )
            )
        );
        $builder->add('media_mainImage', 'hidden');

        $builder->add(
            'imagePosition',
            'choice',
            array(
                'required' => false,
                'choices'   => array(
                    'left' => 'Left',
                    'right' => 'Right',
                    'center' => 'Center',
                    'top' => 'Top',
                    'bottom' => 'Bottom',
                ),
                'label' => 'Image position'
            )
        );

        $builder->add(
            'block_url',
            'text',
            array(
                'required' => false,
                'label' => 'Url of the block',
                'attr' => array(
                    "size" => "50"
                )
            )
        );

    }

    public function getName() {
        return 'Standard';
    }

}
