<?php
namespace App\SiteBundle\Form\Block;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class Standard extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {

        $builder->add(
            'title',
            'text',
            array(
                'label' => 'Title',
                'required' => false,
                'attr' => array(
                    "size" => "50"
                )
            )
        );

        $builder->add(
            'subtitle',
            'text',
            array(
                'label' => 'Sub-title',
                'required' => false,
                'attr' => array(
                    "size" => "50"
                )
            )
        );

        $builder->add(
            'mainContent',
            'textarea',
            array(
                'label' => 'Main content',
                'required' => false,
                'attr' => array(
                    "class" => "kit-cms-rte-advanced"
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
                    'top' => 'Top',
                    'center' => 'Centered',
                    'bottom' => 'Bottom',
                    'hidden' => 'Hidden'
                ),
                'label' => 'Image position'
            )
        );
        $builder->add(
            'titleAboveFloat',
            'choice',
            array(
                'required' => false,
                'choices'   => array(
                    'YES' => 'Above',
                    'NO' => 'Left or right the image'
                ),
                'label' => 'Title position for images left or right',
                'attr' => array(
                    "class" => "kit-cms-advanced"
                )
            )
        );
        $builder->add(
            'image_url',
            'text',
            array(
                'required' => false,
                'label' => 'Url of the image',
                'attr' => array(
                    "size" => "50"
                )
            )
        );

        $builder->add(
            'subContent',
            'textarea',
            array(
                'required' => false,
                'attr' => array(
                    "class" => "kit-cms-rte-advanced"
                )
            )
        );

        $builder->add(
            'block_presentation',
            'choice',
            array(
                'required' => false,
                'choices'   => array(
                    'app-block-style-black' => 'Black'
                ),
                'label' => 'Alternative block presentation'
            )
        );

        $builder->add(
            'displaySeparator',
            'checkbox',
            array(
                'required' => false,
                'value' => 'YES',
                'label' => 'Display separation bar ?',
                'attr' => array(
                    "class" => "kit-cms-rte-simple"
                )
            )
        );

    }

    public function getName() {
        return 'Standard';
    }

    public function filterList() {
        return array(
            'mainContent' => 'stripTagText',
            'subContent' => 'stripTagText',
        );
    }


}
