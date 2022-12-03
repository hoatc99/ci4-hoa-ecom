<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= base_url() ?>">

    <?= $this->include('clients\includes\metas') ?>
    <?= $this->include('clients\includes\styles') ?>

    <title>HoaEcom - <?= $title ?></title>
</head>

<body class="animsition">
    <?= $this->include('clients\partials\header') ?>

    <?= $this->include('clients\components\cart') ?>

    <?= $this->renderSection('content') ?>

    <?= $this->include('clients\partials\footer') ?>
    
    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <?= $this->renderSection('modals') ?>

    <?= $this->include('clients\includes\scripts') ?>
    <?= $this->renderSection('scripts') ?>
</body>

</html>