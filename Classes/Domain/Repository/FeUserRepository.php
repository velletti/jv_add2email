<?php
namespace JVE\JvAdd2email\Domain\Repository;

use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/***
 *
 * This file is part of the "Banner Guthaben" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Joerg Velletti <typo3@velletti.de>
 *
 ***/

/**
 * The repository for users
 */
class FeUserRepository {
    /** @var ConnectionPool  */
    public $connectionPool ;

    /** @var QueryBuilder  */
    public $queryBuilder ;

    /** @var Connection  */
    public $connection ;

    public function __construct(  ) {
        $this->connectionPool = GeneralUtility::makeInstance( "TYPO3\\CMS\\Core\\Database\\ConnectionPool");
        $this->queryBuilder =  $this->connectionPool->getQueryBuilderForTable('fe_users') ;
        $this->connection = $this->connectionPool->getConnectionForTable('fe_users') ;
    }


    public function getUser( $userId ) {
        $this->queryBuilder ->select('*')->from('fe_users')
            ->where( $this->queryBuilder->expr()->eq('uid', $this->queryBuilder->createNamedParameter( $userId , Connection::PARAM_INT )) )
            ->setMaxResults(1)
             ;

        return $this->queryBuilder->execute()->fetch() ;

    }

    public function updateUser( $userId = 0 , $value = 0 ) {
        $this->queryBuilder ->update('fe_users')
            ->where( $this->queryBuilder->expr()->eq('uid', $this->queryBuilder->createNamedParameter( $userId , Connection::PARAM_INT )) )
            ->set('module_sys_dmail_newsletter', $value )
            ->set('module_sys_dmail_html', $value ) ;

        $this->queryBuilder->execute() ;

        if ( !$this->connection->errorInfo() ) {
            return true ;
        } else {
            return false;
        }

    }
}
