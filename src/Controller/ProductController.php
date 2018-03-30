<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Request;


class ProductController extends Controller
{
    /**
     * @Route("/product/create/{title}/{summary}/{photo}/{description}/{ingredients}/{price}/{cat}", name="product_create")
     */
    public function createAction($title, $summary, $photo, $description, $ingredients, $price, $cat)
    {
        // creating new product
        $product = new Product();
        $product ->setTitle($title);
        $product ->setSummary($summary);
        $product ->setPhoto($photo);
        $product -> setDescription($description);
        $product ->setIngredients($ingredients);
        $product -> setPrice($price);

        $category = new Category();
        $category->setName($cat); // setting default as a cathegory name for all new products

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
     * @Route("/product/new", name="product_new_form")
     */
    public function newFormAction() {
        $argsArray = [
            ];

    $templateName = 'product/form';
    return $this->render($templateName . '.html.twig', $argsArray);
    }



    /**
     * @Route("/product/processNewForm", name="product_process_new_form")
     */
    public function processNewFormAction(Request $request) {

        $title = $request->request->get('title');
        $summmary = $request->request->get('summary');
        $photo = $request->request->get('photo');
        $description = $request->request->get('description');
        $ingredients = $request->request->get('ingredients');
        $price = $request->request->get('price');
        $category = $request->request->get('cat');

        return $this->createAction($title, $summmary, $photo, $description, $ingredients, $price, $category);

    }



    public function createActionFromForm($product) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
        return $this->listAction($product->getId());
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
