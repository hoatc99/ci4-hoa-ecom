<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="<?= base_url() ?>">

    <?= $this->include('clients2\includes\metas') ?>
    <?= $this->include('clients2\includes\styles') ?>

    <title>HoaEcom - <?= $title ?></title>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?= $this->include('clients2\partials\top') ?>

    <?= $this->include('clients2\partials\header') ?>
    
    <?= $this->include('clients2\partials\department') ?>

    <?= $this->renderSection('content') ?>

    <?= $this->include('clients2\partials\footer') ?>

    <?= $this->include('clients2\includes\scripts') ?>
</body>

</html>