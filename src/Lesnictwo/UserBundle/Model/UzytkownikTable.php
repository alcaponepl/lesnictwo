<?php
namespace Lesnictwo\UserBundle\Model;


use Brown298\DataTablesBundle\Model\DataTable\AbstractQueryBuilderDataTable;
use Brown298\DataTablesBundle\Model\DataTable\QueryBuilderDataTableInterface;
use Symfony\Component\HttpFoundation\Request;


class UzytkownikTable extends AbstractQueryBuilderDataTable implements QueryBuilderDataTableInterface
{

    protected $columns = array(
        'uzytkownik.uzytkownikId'=> '#',
        'uzytkownik.imie' => 'Imię',
        'uzytkownik.nazwisko' => 'Nazwisko',
        'uzytkownik.login' => 'Login',
        'edit'=>'',
        'delete'=>'',
        
    );

    /**
     * getDataFormatter
     *
     * @return \Closure
     */
    public function getDataFormatter()
    {
        $renderer = $this->container->get('templating');
        return function($data) use ($renderer) {
            $count   = 0;
            $results = array();

            foreach ($data as $row) {
                $results[$count][] = $renderer->render('LesnictwoUserBundle:Formatters:showFormatter.html.twig', array('uzytkownikId' => $row['uzytkownikId']));
                $results[$count][] = $row['imie'];
                $results[$count][] = $row['nazwisko'];
                $results[$count][] = $row['login'];
                $results[$count][] = $renderer->render('LesnictwoUserBundle:Formatters:editFormatter.html.twig', array('uzytkownikId' => $row['uzytkownikId']));
                $results[$count][] = $renderer->render('LesnictwoUserBundle:Formatters:deleteFormatter.html.twig', array('uzytkownikId' => $row['uzytkownikId']));
                $count += 1;
            }

            return $results;
        };
    }


    public function getQueryBuilder(Request $request = null)
    {
        $userRepository = $this->em->getRepository('Lesnictwo\UserBundle\Entity\Uzytkownik');
        $qb = $userRepository->createQueryBuilder('uzytkownik');
            //->andWhere('uzytownik.deleted = false');

        return $qb;
    }
}
