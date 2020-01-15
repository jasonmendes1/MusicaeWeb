<?php

use yii\db\Migration;

/**
 * Class m200114_194505_init_rbac
 */
class m200114_194505_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200114_194505_init_rbac cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $auth = Yii::$app->authManager;

        $criarBanda = $auth->createPermission('criarBanda');
        $criarBanda->description = 'Cria uma banda';
        $auth->add($criarBanda);

        $editarBanda = $auth->createPermission('editarBanda');
        $editarBanda->description = 'Editar banda';
        $auth->add($editarBanda);

        $eliminarBanda = $auth->createPermission('eliminarBanda');
        $eliminarBanda->description = 'Elimina uma banda';
        $auth->add($eliminarBanda);

        $criarGenero = $auth->createPermission('criarGenero');
        $criarGenero->description = 'Cria genero';
        $auth->add($criarGenero);

        $editarGenero = $auth->createPermission('editarGenero');
        $editarGenero->description = 'Edita genero';
        $auth->add($editarGenero);

        $eliminarGenero = $auth->createPermission('eliminarGenero');
        $eliminarGenero->description = 'Elimina genero';
        $auth->add($eliminarGenero);

        $criarHabilidade = $auth->createPermission('criarHabilidade');
        $criarHabilidade->description = 'Cria habilidade';
        $auth->add($criarHabilidade);

        $editarHabilidade = $auth->createPermission('editarHabilidade');
        $editarHabilidade->description = 'Edita habilidade';
        $auth->add($editarHabilidade);

        $eliminarHabilidade = $auth->createPermission('eliminarHabilidade');
        $eliminarHabilidade->description = 'Elimina habilidade';
        $auth->add($eliminarHabilidade);

        $criarMusico = $auth->createPermission('criarMusico');
        $criarMusico->description = 'Cria musico';
        $auth->add($criarMusico);

        $editarMusico = $auth->createPermission('editarMusico');
        $editarMusico->description = 'Edita musico';
        $auth->add($editarMusico);

        $eliminarMusico = $auth->createPermission('eliminarMusico');
        $eliminarMusico->description = 'Elimina musico';
        $auth->add($eliminarMusico);

        $criarProfile = $auth->createPermission('criarProfile');
        $criarProfile->description = 'Cria profile';
        $auth->add($criarProfile);

        $editarProfile = $auth->createPermission('editarProfile');
        $editarProfile->description = 'Edita profile';
        $auth->add($editarProfile);

        $eliminarProfile = $auth->createPermission('eliminarProfile');
        $eliminarProfile->description = 'Elimina profile';
        $auth->add($eliminarProfile);

        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $criarBanda);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "user" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $editarBanda);
        $auth->addChild($admin, $criarBanda);
        $auth->addChild($admin, $editarBanda);
        $auth->addChild($admin, $eliminarBanda);
        $auth->addChild($admin, $criarGenero);
        $auth->addChild($admin, $editarGenero);
        $auth->addChild($admin, $eliminarGenero);
        $auth->addChild($admin, $criarHabilidade);
        $auth->addChild($admin, $editarHabilidade);
        $auth->addChild($admin, $eliminarHabilidade);
        $auth->addChild($admin, $criarMusico);
        $auth->addChild($admin, $editarMusico);
        $auth->addChild($admin, $eliminarMusico);
        $auth->addChild($admin, $criarProfile);
        $auth->addChild($admin, $editarProfile);
        $auth->addChild($admin, $eliminarProfile);
        $auth->addChild($admin, $user);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($user, 5);
        $auth->assign($admin, 4);
    }

    public function down()
    {
        // echo "m200114_194505_init_rbac cannot be reverted.\n";
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        return false;
    }
}
