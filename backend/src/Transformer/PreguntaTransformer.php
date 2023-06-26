<?php

namespace App\Transformer;

use App\DTO\PreguntaDTO;
use App\Entity\Pregunta;
use App\Entity\UsuariosRespuesta;
class PreguntaTransformer
{
    public function toDTO(Pregunta $pregunta, UsuariosRespuesta $respuesta): PreguntaDTO
    {
        $preguntaDTO = new PreguntaDTO();
        $preguntaDTO->setTitulo($pregunta->getTitulo());
        $preguntaDTO->setDescripcion($pregunta->getDescripcion());
        $preguntaDTO->setRespuesta($respuesta->getRespuesta());

        return $preguntaDTO;
    }
}
