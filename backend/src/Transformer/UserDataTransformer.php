<?php

namespace App\Transformer;
use App\DTO\PreguntaDTO;
use App\DTO\UserDataDTO;
use App\Entity\Pregunta;
use App\Entity\UsuariosRespuesta;

class UserDataTransformer
{
    public function transform(Array $data): array
    {
        $result = [];

        foreach ($data as $i => $item) {
            $preguntas = [];
            $dto = new UserDataDTO();
            $dto->setCompletado($item->getCompletado());
            foreach ($item->getChatPreguntas() as $i => $pregunta) {
                $preguntas[] = $this->transformPregunta($pregunta->getPregunta(),  $pregunta->getRespuesta());
            }
            $dto->setPreguntas($preguntas);
            $dto->setProducto($item->getRecomendacion()->getProducto());
            $dto->setFecha($item->getFechaInicio());
            $result[] = $dto;
        }

        return $result;
    }

    public function transformPregunta(Pregunta $pregunta, UsuariosRespuesta $respuesta): PreguntaDTO
    {
        $preguntaDTO = new PreguntaDTO();
        $preguntaDTO->setTitulo($pregunta->getTitulo());
        $preguntaDTO->setDescripcion($pregunta->getDescripcion());
        $preguntaDTO->setRespuesta($respuesta->getRespuesta());

        return $preguntaDTO;
    }
}