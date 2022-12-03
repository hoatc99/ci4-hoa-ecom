<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= base_url() ?>">

    <?= $this->include('admin\includes\metas') ?>
    <?= $this->include('admin\includes\styles') ?>

    <title>HoaBinhGroup - <?= $title ?></title>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?= $this->include('admin\partials\navbar') ?>

            <?= $this->include('admin\partials\sidebar') ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1><?= $title ?></h1>
                        <?= session()->getFlashdata('error') ?>
                        <?= service('validation')->listErrors() ?>
                    </div>
                    <?= $this->renderSection('content') ?>
                </section>
                <?= $this->renderSection('modals') ?>
            </div>
            <?= $this->include('admin\partials\footer') ?>
        </div>
    </div>

    <?= $this->include('admin\includes\scripts') ?>
    <?= $this->renderSection('scripts') ?>
</body>

</html>