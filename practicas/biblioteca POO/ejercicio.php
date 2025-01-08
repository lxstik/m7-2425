<?php

class Llibre
{
    public string $titol;
    public string $autor;
    public int $anyPublicado;
    public string $foto;

    public function __construct(string $titol, string $autor, int $anyPublicado, string $foto)
    {
        $this->titol = $titol;
        $this->autor = $autor;
        $this->anyPublicado = $anyPublicado;
        $this->foto = $foto;
    }
}

class Biblioteca
{
    public array $llibres = [];
    public function afegirLlibre() {
        array_push($llibres);
    }

    public function mostrarLlibres() {}

    public function cercarLlibre() {}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Añadir un libro</h2>
        <form id="addBookForm" class="mb-4" method="post">
            <div class="mb-3">
                <label for="bookTitle" class="form-label">Títol del llibre</label>
                <input type="text" class="form-control" id="bookTitle" placeholder="Introduce el título del libro" required>
            </div>
            <div class="mb-3">
                <label for="authorName" class="form-label">Nom de l'autor</label>
                <input type="text" class="form-control" id="authorName" placeholder="Introduce el nombre del autor" required>
            </div>
            <div class="mb-3">
                <label for="publicationYear" class="form-label">L'any de publicació</label>
                <input type="number" class="form-control" id="publicationYear" placeholder="Introduce el año de publicación" required>
            </div>
            <div class="mb-3">
                <label for="imageUrl" class="form-label">URL de la imatge del llibre</label>
                <input type="url" class="form-control" id="imageUrl" placeholder="Introduce la URL de la imagen" required>
            </div>
            <button type="submit" class="btn btn-primary">Añadir libro</button>
        </form>


        <h2>Buscar libros</h2>
        <form id="searchBookForm" class="mb-4" method="post">
            <div class="mb-3">
                <label for="searchQuery" class="form-label">Buscar por título o autor</label>
                <input type="text" class="form-control" id="searchQuery" placeholder="Introduce el título o el autor">
            </div>
            <button type="submit" class="btn btn-secondary">Buscar</button>
        </form>


        <h2>Libros añadidos</h2>
        <div id="bookList" class="row g-3">

        </div>
    </div>

</body>

</html>