<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />

  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            nunito: ['Nunito', 'sans-serif']
          }
        }
      }
    }
  </script>
  <style>
    html {
      scroll-behavior: smooth;
    }

    .choices,
    .choices__inner,
    .choices__input,
    .choices__list--dropdown,
    .choices__item--selectable {
      background-color: #282b37;
      border-radius: 0.5rem;
    }

    .choices__item--selectable.is-highlighted {
      color: #282b37 !important;
    }

    .choices__input {
      font-size: 1rem;
      background-color: transparent;
    }

    .choices__inner {
      border-color: #53525c;
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      display: inline-block;
      vertical-align: top;
      width: 100%;
      padding: 4.5px 7.5px 0.2px;
    }

    .choices.is-focused .choices__inner {
      border-radius: 0.5rem;
      box-shadow: 0 0 0 3px rgba(82, 85, 90, 255);
    }

    .choices.is-loading .choices__inner,
    .choices.is-loading .choices__input {
      background-color: transparent;
    }

    .choices__list--dropdown {
      margin-top: 5px;
      /* padding: 5px 10px; */
    }

    .choices[data-type*=select-one] .choices__input {
      margin-bottom: 4px;
      background-color: #53525c;
      border: 0;
      border-radius: 0;
    }

    .choices__list--dropdown .choices__item {
      /* border-radius: 0.5rem; */
      color: inherit;
    }

    .is-open .choices__list--dropdown {
      z-index: 15;
      border-color: #53525c;
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }

    .choices__list--multiple .choices__item,
    .choices__list--multiple .choices__item.is-highlighted {
      font-family: inherit;
      background-color: #53525c;
      border: 1px solid #282b37;
    }

    .choices[data-type*=select-multiple] .choices__button,
    .choices[data-type*=text] .choices__button {
      border-left: 1px solid #4a5568;
    }

    .select-has-error .choices__inner {
      border-color: #f56565;
      background-color: #fff5f5;
    }
  </style>
</head>

<body class="font-nunito" data-theme="dracula">
  <div class='relative mx-auto flex max-w-4xl min-h-screen flex-col px-8 py-12 md:px-2'>
    <main class='flex-1'>
      <div class="navbar bg-base-100">
        <div class="navbar-start">
          <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h8m-8 6h16" />
              </svg>
            </div>
            <ul
              tabindex="0"
              class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
              <li><a href="/proyek">Proyek</a></li>
              <li><a href="/lokasi">Lokasi</a></li>
            </ul>
          </div>
          <a class="btn btn-ghost text-xl" href="/">SEI Consumer</a>
        </div>
        <div class="navbar-center hidden lg:flex">
          <ul class="menu menu-horizontal px-1">
            <li><a href="/proyek">Proyek</a></li>
            <li><a href="/lokasi">Lokasi</a></li>
          </ul>
        </div>
        <div class="navbar-end">
          <a class="btn" href="https://github.com/aliftrd/sei-consumer">Github</a>
        </div>
      </div>