<?php

namespace App\Repository;

use App\Entity\Livre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Livre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Livre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Livre[]    findAll()
 * @method Livre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livre::class);
    }

    /**
     * @return Livre[] Returns an array of Livre objects
     */

    public function findByTitre($value)
    {
        return $this->createQueryBuilder('livre')
            ->andWhere('livre.titre LIKE :val')
            ->setParameter('val', '%' . $value . '%')
            ->getQuery()
            ->getResult();
    }

    public function findDates()
    {
        return $this->createQueryBuilder('livre')
            ->select('livre.date_de_parution')
            ->distinct()
            ->getQuery()
            ->getResult();
    }


    public function findBetweenTwoDates($dateMin, $dateMax)
    {
        return $this->createQueryBuilder('livre')
            ->andWhere('livre.date_de_parution BETWEEN :dateMin AND :dateMax')
            ->setParameter('dateMin',  $dateMin . '-01-01')
            ->setParameter('dateMax',  $dateMax . '-12-31')
            ->getQuery()
            ->getResult();
    }


    public function findByNote($note)
    {
        return $this->createQueryBuilder('livre')
            ->andWhere('livre.note = :note')
            ->setParameter('note',  $note)
            ->getQuery()
            ->getResult();
    }


    public function findByDate($date_de_parution)
    {
        return $this->createQueryBuilder('livre')
            ->andWhere('livre.date_de_parution = :date_de_parution')
            ->setParameter('date_de_parution',  $date_de_parution)
            ->getQuery()
            ->getResult();
    }

    public function findByAuteur($auteur)
    {
        return $this->createQueryBuilder('livre')
            ->innerJoin('livre.auteurs', 'a', 'WITH', 'a.id = :id')
            ->setParameter('id', $auteur)
            ->getQuery()
            ->getResult();
    }


    public function findByGenre($genre)
    {
        return $this->createQueryBuilder('livre')
            ->innerJoin('livre.genres', 'g', 'WITH', 'g.id = :id')
            ->setParameter('id', $genre)
            ->getQuery()
            ->getResult();
    }

    public function getPaginatedLivres($page)
    {
        $qb = $this->createQueryBuilder("l")
            ->orderBy("l.titre")
            ->setFirstResult(($page - 1) * 5)
            ->setMaxResults(5);
        return $qb->getQuery()->getResult();
    }

    public function countLivres()
    {
        return $this->createQueryBuilder('l')
            ->select("COUNT(l.id)")
            ->getQuery()
            ->getSingleScalarResult();
    }

    /*
    public function findOneBySomeField($value): ?Livre
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
