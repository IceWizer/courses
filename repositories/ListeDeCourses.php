<?php

require_once dirname(__FILE__) . '/Entity.php';

/**
 * Description of Country
 *
 * @author Florian
 */
class ListeDeCourses extends Entity{
    private $label;

    public function __construct($p_identifier, $p_label)
    {
        parent::__construct($p_identifier);

        $this->label = $p_label;
    }
    public static function __constructStatic($p_identifier, $p_label)
    {
        return new ListeDeCourses($p_identifier, $p_label);
    }

    public function getLabel()
    {
        return $this->label;
    }

    public static function insert($label)
    {
        
        $sql = 'INSERT INTO Produit (label) VALUES (:label)';
        
        MyPDO::InsertDelete($sql, array(':label' => $label));
    }

    public function view()
    {
        echo "<td>" . htmlspecialchars($this->identifier) . "</td>";
        echo "<td>" . htmlspecialchars($this->label) . "</td>";
    }

    public static function getProducts()
    {
        $sql = 'SELECT Produit.identifier, Produit.label
                FROM Produit';
        
        $products = array();
        
        $productsRaw = MyPDO::Select($sql, array());
        $productsFetch = $productsRaw->FetchAll(PDO::FETCH_FUNC, "ListeDeCourses::__constructStatic");
        
        foreach ($productsFetch as $product)
        {
            $products[] = $product;
        }
        
        return $products;
    }

    public function jsonSerialize(): array {
        return [
            'identifier' => $this->identifier,
            'label' => $this->label
                ];
    }
    
    public function toArray(): array {
        return [
            'identifier' => $this->identifier,
            'label' => $this->label
                ];
    }
}