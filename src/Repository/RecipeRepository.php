<?php

namespace App\Repository;

use App\Entity\Recipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Recipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recipe[]    findAll()
 * @method Recipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Recipe::class);
    }

    function save($table, $insData ) 
    {
        $columns = implode(", ",array_keys($insData));
        $values  = array_values($insData);
        $valuesString =  sqlStringBuilder($values);
        $sql = "INSERT INTO $table ($columns) VALUES($valuesString)";
        queryMysql($sql);
    }
      
    public function findAllLessThanPrepTime($prepTime): array
    {
        $conn = $this->getEntityManager()->getConnection();
    
        $sql = '
            SELECT * FROM recipe r
            WHERE r.prepTime < :prepTime
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['recipes' => 100]);
    
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

    public function findAllByNameOrIngredient($term): array
    {
        $conn = $this->getEntityManager()->getConnection();
    
        $sql = "SELECT * FROM recipe WHERE title OR ingredients LIKE '%$term%'";

        $stmt = $conn->prepare($sql);
        $stmt->execute(['term' => 100]);
    
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

    public function findRecipeById($term): array
    {
        $conn = $this->getEntityManager()->getConnection();
    
        $sql = "SELECT * FROM recipe WHERE id = '$term'";

        $stmt = $conn->prepare($sql);
        $stmt->execute(['term' => 100]);
    
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

    public function findAllByCatagory($catagory): array
    {
        $conn = $this->getEntityManager()->getConnection();
    
        $sql = '
            SELECT * FROM recipe r
            WHERE r.catagory = :catagory
            ORDER BY r.title ASC
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['recipes' => 100]);
    
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

    public function findAllByMethod($method): array
    {
        $conn = $this->getEntityManager()->getConnection();
    
        $sql = '
            SELECT * FROM recipe r
            WHERE r.method = :method
            ORDER BY r.title ASC
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['recipes' => 100]);
    
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

    public function findAll(): array
    {
        $conn = $this->getEntityManager()->getConnection();
    
        $sql = '
            SELECT * FROM recipe r
            ORDER BY r.title ASC
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['recipes' => 100]);
    
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }
//     function update($table, $setProperty, $setValue, $queryProperty, $queryValue)
//     {
//         $sql = "UPDATE $table SET  $setProperty='$setValue' WHERE $queryProperty = '$queryValue'";
//         return queryMysql($sql);
// }
}
