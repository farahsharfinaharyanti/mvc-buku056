<?php

require_once __DIR__ . '/../app/controllers/BukuController.php';

$controller = new BukuController();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;

    case 'create':
        $controller->create();
        break;

    case 'store':
        $controller->store();
        break;

    case 'edit':
        $controller->edit();
        break;

    case 'update':
        $controller->update();
        break;

    case 'delete':
        $controller->delete();
        break;

    default:
        http_response_code(404);
        echo 'Halaman tidak ditemukan.';
        break;
}