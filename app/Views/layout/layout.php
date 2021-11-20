<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  
  <?= link_tag('fonts/icon-font/css/style.css') ?>
  <?= link_tag('fonts/typography-font/typo.css') ?>
  <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Plugin'stylesheets  -->
  <?= link_tag('plugins/aos/aos.min.css') ?>
  <?= link_tag('plugins/slick/slick.min.css') ?>
  <!-- Vendor stylesheets  -->
  <?= link_tag('css/main.css') ?>
  <?= link_tag('css/style.css') ?>

  <title><?= $title ?></title>
</head>

<body>
  <?= $this->renderSection('content') ?>

  
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- Vendor Scripts -->
  <?= script_tag('js/vendor.min.js') ?>
  <!-- Plugin's Scripts -->
  <?= script_tag('plugins/aos/aos.min.js') ?>
  <?= script_tag('plugins/slick/slick.min.js') ?>
  <?= script_tag('plugins/menu/menu.js') ?>
  <!-- Activation Script -->
  <?= script_tag('js/custom.js') ?>
  <?= script_tag('js/script.js') ?>
</body>

</html>