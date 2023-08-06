<?php
namespace JVE\JvAdd2email\Controller;

use JVE\JvAdd2email\Domain\Repository\FeUserRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Http\ForwardResponse;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/***
 *
 * This file is part of the "jv Add2email" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Joerg Velletti <typo3@velletti.de>
 *
 ***/

/**
 * ConnectorController
 */
class Add2emailController extends ActionController
{
    /** @var FeUserRepository $feUserRepository */
    public $feUserRepository ;

    public function initializeAction()
    {
        parent::initializeAction();
        $this->feUserRepository = GeneralUtility::makeInstance( "JVE\\JvAdd2email\\Domain\\Repository\\FeUserRepository");
    }
    /**
     * action list
     *
     * @return void
     */
    public function showAction(): ResponseInterface
    {
        $user = $GLOBALS['TSFE']->fe_user->user ;
        if(is_array($user) && array_key_exists("uid" , $user)) {
            $user = $this->feUserRepository->getUser($user['uid']) ;
            $this->view->assign('user', $user);
            $this->view->assign('newsletter', $user['module_sys_dmail_newsletter']);
        }
        return $this->htmlResponse();


    }

    /**
     * action addAction
     *
     *
     */
    public function addAction()
    {
        $user = $GLOBALS['TSFE']->fe_user->user ;
        if(is_array($user) && array_key_exists("uid" , $user)) {
            $user = $this->feUserRepository->getUser($user['uid']) ;
            if( $user ) {
                $this->feUserRepository->updateUser($user['uid'] , 1);

                $this->redirect("show" , null, null , array("hash" => ($user['tstamp'] * $user['uid'] )) ) ;
            }
        }
        return new ForwardResponse('show');

    }



    /**
     * action removeAction
     *
     *
     */
    public function removeAction()
    {
        $user = $GLOBALS['TSFE']->fe_user->user ;
        if(is_array($user) && array_key_exists("uid" , $user)) {
            $user = $this->feUserRepository->getUser($user['uid']) ;
            if( $user ) {
                $this->feUserRepository->updateUser($user['uid'] , 0 );

                $this->redirect("show" , null, null , array("hash" => ($user['tstamp'] * $user['uid'] ) ) ) ;
            }
        }
        return new ForwardResponse('show');
    }

    /**
     * action unsubscribe need validation via hash .. not implemented yet
     *
     * @return void
     */
    public function unsubscribeAction()
    {
        $this->redirect("show");
    }

}
