<?php
namespace GoEat;

require '../vendor/autoload.php';

use GoEat\Utilizador;

include 'includes/top.php';

?>

<div class="container">
    <div class="row mt-3 mb-3">
        <div class="col">
            <a href="registoAdmForm.php" class="btn btn-warning ">Adicionar Admin</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Perfil</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $resultados = Utilizador::search();
                        foreach ($resultados as $resultado) {
                    ?>
                        <tr>
                            <td><?php echo $resultado->getNome();?></td>
                            <td><?php echo $resultado->getEmail();?></td>
                            <td><?php echo $resultado->getPerfil();?></td>
                            <td><?php
                                if ($resultado->getPerfil() == 'Cliente'){
                                    $entidade = Cliente::find($resultado->getEntidade());
                                    $estado = Estado::find($entidade->getEstado());
                                    echo $estado->getEstado();
                                }else if ($resultado->getPerfil() == 'Restaurante'){
                                    $entidade = Restaurante::find($resultado->getEntidade());
                                    $estado = Estado::find($entidade->getEstado());
                                    echo $estado->getEstado();
                                }  
                            ?></td>
                            
                            <td class="text-end">
                                <?php if ($resultado->getPerfil() != 'Administrador'){ ?>
                                <a href="detalhes_<?php echo $resultado->getPerfil()?>.php?id=<?php echo $resultado->getEntidade(); ?>" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-info fa-fw"></i>
                                </a>
                                <?php } ?>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>
<?php

include 'includes/footer.php';