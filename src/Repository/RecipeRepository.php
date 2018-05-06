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

    function saveRecipe(array $insData ) 
    {
        $conn = $this->getEntityManager()->getConnection();

        $columns = implode(", ",array_keys($insData));
        $values  = array_values($insData);
        $valuesString =  $this->sqlStringBuilder($values);
        $sql = "INSERT INTO recipe ($columns) VALUES($valuesString)";
       
        $stmt = $conn->prepare($sql);
        $stmt->execute(['term' => 100]);
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

    public function findAllByCatagory($category): array
    {
        $conn = $this->getEntityManager()->getConnection();
    
        $sql = "SELECT * FROM recipe WHERE catagory = '$category'";

        $stmt = $conn->prepare($sql);
        $stmt->execute(['recipes' => 100]);
    
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

    public function sqlStringBuilder($arrayValues)
    {
        $outputString ='';
        for ($i = 0; $i < count($arrayValues); $i++) 
        {
            $outputString =  $outputString . '\''.$arrayValues[$i].'\'';

            if($i < count($arrayValues)-1)
            {
                $outputString =  $outputString .  ', ';
            }
        }
        return  $outputString;
    }
}
