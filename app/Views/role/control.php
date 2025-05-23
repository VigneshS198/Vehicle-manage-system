<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>    

<div class="body-wrapper">
    <div class="body-wrapper-inner">
        <div class="container-fluid pt-110" style="padding-top: 110px;">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="mb-4">Manage Permissions for Role: 
                        <span class="text-primary"><?= esc($role->name) ?></span>
                    </h2>

                    <?php if (session()->getFlashdata('message')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= esc(session()->getFlashdata('message')) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url("/roles/{$role->id}/permissions") ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="row">
                            <?php foreach ($permissions as $permission): ?>
                                <div class="col-md-4">
                                    <div class="form-check mb-2">
                                        <input 
                                            class="form-check-input" 
                                            type="checkbox" 
                                            name="permissions[]" 
                                            value="<?= $permission->id ?>" 
                                            id="perm_<?= $permission->id ?>"
                                            <?= in_array($permission->id, $assignedPermissions) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="perm_<?= $permission->id ?>">
                                            <?= esc($permission->display_name ?? $permission->name) ?>
                                        </label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary">💾 Save Permissions</button>
                            <a href="<?= base_url('/roles') ?>" class="btn btn-secondary">↩️ Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
