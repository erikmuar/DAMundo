



<?php
// Libro.php
class Libro {
    private string $titulo;
    private string $autor;
    private int $anioPublicacion;
    private int $paginas;

    public function setTitulo(string $titulo): void { $this->titulo = trim($titulo); }
    public function getTitulo(): string { return $this->titulo ?? ''; }

    public function setAutor(string $autor): void { $this->autor = trim($autor); }
    public function getAutor(): string { return $this->autor ?? ''; }

    public function setAnioPublicacion(int $anio): void { $this->anioPublicacion = $anio; }
    public function getAnioPublicacion(): int { return $this->anioPublicacion ?? 0; }

    public function setPaginas(int $paginas): void { $this->paginas = $paginas; }
    public function getPaginas(): int { return $this->paginas ?? 0; }

    public function resumen(): string {
        return sprintf(
            "«%s», de %s (%d) — %d páginas.",
            $this->getTitulo(), $this->getAutor(), $this->getAnioPublicacion(), $this->getPaginas()
        );
    }
}
