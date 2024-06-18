<div class="container">
    <div class="row">
        <?php foreach ($todos as $todo): ?>
            <?php
                $imgStatus = $todo->isDone() ? 'done' : 'todo';
                $createdAtDate = $todo->getCreatedAt()->format('d/m/Y');
                $createdAtTime = $todo->getCreatedAt()->format('H:i:s');
            ?> 
            <div class="col mb-3 mb-sm-20">
                <div class="card shadow" style="width: 18rem;">
                    <img src="./assets/<?= $imgStatus; ?>.webp" alt="Task image" class="card-img-top" style="height: 15rem;">
                    <div class="card-body">
                        <h5>
                            <label class="card-title mb-0 pb-0" for="<?= $todo->getTitle(); ?>">
                                <?= $todo->getTitle(); ?>
                            </label>
                        </h5>

                        <h6 class="card-subtitle mt-0 pt-0 mb-3">Créé le <?=$createdAtDate?> à <?=$createdAtTime?></h6>
                        
                        <div class="card-text mb-4">
                            <?= $todo->getDescription(); ?>
                        </div>
                        
                        <form action="./index.php" method="post">
                            <input class="btn btn-primary" type="submit" value="Terminé" <?php if ($todo->isDone()) echo 'disabled'; ?>>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>