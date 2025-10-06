<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?= $title === "" ? 'Website Saya' : $title; ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.lordicon.com/lordicon.js"></script>
   <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            dongker: "#001f54", // warna HEX custom
          }
        }
      }
    }
  </script>
</head>

<body class="h-[1000px]">