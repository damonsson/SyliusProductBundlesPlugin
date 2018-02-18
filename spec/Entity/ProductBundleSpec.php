<?php

namespace spec\SolutionDrive\SyliusProductBundlesPlugin\Entity;

use SolutionDrive\SyliusProductBundlesPlugin\Entity\ProductBundle;
use PhpSpec\ObjectBehavior;
use SolutionDrive\SyliusProductBundlesPlugin\Entity\ProductBundleInterface;
use SolutionDrive\SyliusProductBundlesPlugin\Entity\ProductBundleSlotInterface;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Resource\Model\CodeAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

class ProductBundleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ProductBundle::class);
    }

    function it_implements_product_bundle_interface()
    {
        $this->shouldImplement(ProductBundleInterface::class);
    }

    function it_implements_resource_interface()
    {
        $this->shouldImplement(ResourceInterface::class);
    }

    function it_implements_code_aware_interface()
    {
        $this->shouldImplement(CodeAwareInterface::class);
    }

    function it_has_a_name()
    {
        $this->setName('Gargamel Smurf Domination Stuff');
        $this->getName()->shouldReturn('Gargamel Smurf Domination Stuff');
    }

    function it_can_contain_slots(
        ProductBundleSlotInterface $slot
    ) {
        $this->addSlot($slot);
        $this->getSlots()->shouldContain($slot);
    }

    function it_has_a_product(ProductInterface $product)
    {
        $this->setProduct($product);
        $this->getProduct()->shouldReturn($product);
    }
}
