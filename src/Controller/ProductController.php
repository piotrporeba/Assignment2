<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Product;
use App\Entity\Category;





class ProductController extends Controller
{
    /**
     * @Route("/product/create/{description}/{price}", name="product_create")
     */
    public function createAction($description, $price)
    {
        // creating new product
        $product = new Product();
        $product -> setDescription($description);
        $product -> setPrice($price);

        $category = new Category();
        $category->setName('Default'); // setting default as a cathegory name for all new products

        $product->setCategory($category);

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->persist($category);
        $em->flush();


        return $this->redirectToRoute('product_show', [
            'id' => $product->getId()
    ]);
    }

    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function showAction(Product $product){


        // were assuming that product is not null
        $template ='product/show.html.twig';
        $args = [
            'product' =>$product
        ];
        return $this->render($template,$args);
    }

    /**
     * @Route("/product", name="product_list")
     */
    public function listAction(){

        $productRepository =$this->getDoctrine()->getRepository(Product::class);
        $products = $productRepository->findAll();

        $template ='product/list.html.twig';
        $args =[

            'products' => $products
        ];

        return $this->render($template, $args);

    }


}
