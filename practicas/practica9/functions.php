<?php

session_start();

$libros = [
    [
        "titulo" => "Don Quijote de la Mancha",
        "autor" => "Miguel de Cervantes",
        "url_imagen" => "https://m.media-amazon.com/images/I/91CIwR3QU1L._UF1000,1000_QL80_.jpg",
        "descripcion" => "Una novela clásica que narra las aventuras del caballero Don Quijote y su fiel escudero Sancho Panza."
    ],
    [
        "titulo" => "Cien años de soledad",
        "autor" => "Gabriel García Márquez",
        "url_imagen" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwSsR0pOIFUZYQivZGvfV1a74s4Khz8GrbjA&s",
        "descripcion" => "La obra maestra del realismo mágico que sigue la historia de la familia Buendía en el pueblo ficticio de Macondo."
    ],
    [
        "titulo" => "1984",
        "autor" => "George Orwell",
        "url_imagen" => "https://cdn.prod.website-files.com/6034d7d1f3e0f52c50b2adee/6254291caac6d1e42e8986df_62023ceb41cd1c2807b2841a_9788418933011.jpeg",
        "descripcion" => "Una distopía que explora la opresión, el control gubernamental y la vigilancia en un futuro sombrío."
    ],
    [
        "titulo" => "Orgullo y prejuicio",
        "autor" => "Jane Austen",
        "url_imagen" => "https://m.media-amazon.com/images/I/81RBELGte5L._AC_UF894,1000_QL80_.jpg",
        "descripcion" => "Una novela clásica que explora temas de amor, clase social y malentendidos en la Inglaterra del siglo XIX."
    ],
    [
        "titulo" => "El principito",
        "autor" => "Antoine de Saint-Exupéry",
        "url_imagen" => "https://m.media-amazon.com/images/I/714Hvb52n-L._AC_UF894,1000_QL80_.jpg",
        "descripcion" => "Un cuento poético y filosófico que aborda el amor, la amistad y el sentido de la vida a través de los ojos de un niño."
    ]
];

//generar una copia del array para tranajar sobre el 
if (!isset($_SESSION["libross"])) {
    $_SESSION["libross"] = $libros;
}
