<?php

namespace App\Http\Test;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\ControllerImportDocuments;

class ControllerImportDocumentsTest extends TestCase {
    
    public static function valueProvider(){
        return [
            'testRemessa' => [
                'categories' => 'Remessa', 
                'title' => 'Eget mi proin sed libero enim semestre',
                'expectedResult' => true
            ],
            'testRemessaParcial' => [
                'categories' => 'Remessa Parcial', 
                'title' => 'Eget mi proin sed libero enim Novembro',
                'expectedResult' => true
            ]
        ];
    }

    /**
     * @dataProvider valueProvider
     */
    public function testRuleCategoriesTitle(
        $categories, 
        $title, 
        $expectedResult
    )
    {
        $controllerImportDocuments = new ControllerImportDocuments();

        $isValid = $controllerImportDocuments->validCategoriesTitle(
            $categories, 
            $title
        );
        $this->assertEquals($isValid, $expectedResult);
    }

    public function testJsonMaximumContent() {

        $controllerImportDocuments = new ControllerImportDocuments();

        $documentoContent = "Lorem ipsum dolor sit amet, consectetur".
        "adipiscing elit, sed do eiusmod tempor incididunt ut labore et".
        "dolore magna aliqua. Mi sit amet mauris commodo quis. At elementum".
        "eu facilisis sed odio morbi. Nec ullamcorper sit amet risus nullam eget.". 
        "Ultrices neque ornare aenean euismod elementum. Eget mi proin sed libero enim.".
        "Diam in arcu cursus euismod quis viverra nibh. Quis enim lobortis scelerisque".
        "fermentum dui. Erat imperdiet sed euismod nisi porta lorem mollis aliquam ut. ".
        "Dolor sed viverra ipsum nunc. Sed adipiscing diam donec adipiscing tristique.". 
        "Feugiat in fermentum posuere urna. Cursus in hac habitasse platea dictumst quisque ".
        "sagittis purus sit. Interdum consectetur libero id faucibus nisl tincidunt ".
        "eget nullam. Dui vivamus arcu felis bibendum ut tristique et egestas.". 
        "Congue quisque egestas diam in arcu cursus euismod quis viverra. ".
        "Sit amet consectetur adipiscing elit ut aliquam purus. At in tellus integer feugiat.".
        "Morbi non arcu risus quis varius quam. Bibendum enim facilisis gravida neque.". 
        "Vulputate sapien nec sagittis aliquam malesuada. Volutpat ac tincidunt vitae ".
        "semper quis lectus. Vulputate sapien nec sagittis aliquam. Pellentesque ".
        "habitant morbi tristique senectus et netus et. Quis vel eros donec ac odio tempor.";
        

        $isValid = $controllerImportDocuments->validConteudo($documentoContent);

        $this->assertTrue($isValid);

    }
}