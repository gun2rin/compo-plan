<?php

namespace Compo\CollaboratorBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\DatagridBundle\ProxyQuery\Doctrine\ProxyQuery;

class CollaboratorAdmin extends AbstractAdmin
{
    protected $translationDomain = 'messages';

    /**
     * @param  DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
          //  ->add('usernameCanonical')
            ->add('email')
           // ->add('emailCanonical')
            ->add('enabled')
          //  ->add('salt')
          //  ->add('password')
          //  ->add('lastLogin')
          //  ->add('confirmationToken')
          //  ->add('passwordRequestedAt')
          //  ->add('roles')
          //  ->add('id')
            ->add('firstname')
            ->add('secondname')
            ->add('position')
            ->add('salary')
          //  ->add('created_at')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('username')
          //  ->add('usernameCanonical')
            ->add('email')
         //   ->add('emailCanonical')
            ->add('enabled')
          //  ->add('salt')
          //  ->add('password')
            ->add('lastLogin')
          //  ->add('confirmationToken')
          //  ->add('passwordRequestedAt')
          //  ->add('roles')
          //  ->add('id')
            ->add('firstname')
            ->add('secondname')
            ->add('groups')
            ->add('department')
            ->add('position')
            ->add('salary')
            ->add('created_at')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    protected static function flattenRoles($rolesHierarchy)
    {
        $flatRoles = array();
        foreach($rolesHierarchy as $roles) {

            if(empty($roles)) {
                continue;
            }

            foreach($roles as $role) {
                if(!isset($flatRoles[$role])) {
                    $flatRoles[$role] = $role;
                }
            }
        }

        return $flatRoles;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        $container = $this->getConfigurationPool()->getContainer();
        $roles = $container->getParameter('security.role_hierarchy.roles');

        $rolesChoices = self::flattenRoles($roles);


        $formMapper
            ->tab('edit_record')
            ->with('edit_main', array('class' => 'col-md-6'))->end()
            ->end()
            ->tab('edit_security')
            ->end();



        $formMapper->tab('edit_record')->with('edit_main')
            ->add('firstname')
            ->add('secondname')
            ->add('position')
            ->add('salary')
            ->add('department')
            ->end()->end();

            $formMapper->tab('edit_security')
            ->add('username')
        //   ->add('usernameCanonical')
            ->add('email')
            ->add('newPass', 'text', array(
                    'label' => 'New password',
                    'required' => FALSE
                ))
        //   ->add('emailCanonical')
            ->add('enabled')
        //   ->add('salt')

        //   ->add('lastLogin')
        //   ->add('confirmationToken')
        //   ->add('passwordRequestedAt')
        ->add('groups','sonata_type_model', [
                    'required' => false,
                    'expanded' => true,
                    'multiple' => true,
                ])
            ->add('roles', 'choice',['choices'  => $rolesChoices, 'multiple' => true])
        //
        //   ->add('id')
             ->add('created_at','sonata_type_datetime_picker')

        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('username')
         //   ->add('usernameCanonical')
            ->add('email')
         //   ->add('emailCanonical')
            ->add('enabled')
         //   ->add('salt')
            ->add('password')
        //    ->add('lastLogin')
        //    ->add('confirmationToken')
        //    ->add('passwordRequestedAt')
            ->add('roles')
         //   ->add('id')
            ->add('firstname')
            ->add('secondname')
            ->add('position')
            ->add('salary')
            ->add('created_at')
        ;
    }

    public function prePersist($object) {
        parent::prePersist($object);
        $this->updateUser($object);
    }

    public function preUpdate($object) {
        parent::preUpdate($object);
        $this->updateUser($object);
    }

    public function updateUser(\Compo\CollaboratorBundle\Entity\Collaborator $u) {
        if ($u->getNewPass()) {
            $u->setPlainPassword($u->getNewPass());
        }

        $um = $this->getConfigurationPool()->getContainer()->get('fos_user.user_manager');
        $um->updateUser($u, false);
    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);

        $query->andWhere(
            $query->expr()->neq($query->getRootAliases()[0] . '.username', ':my_param')
         );

        $query->setParameter('my_param', 'root');
        return $query;

    }

}
