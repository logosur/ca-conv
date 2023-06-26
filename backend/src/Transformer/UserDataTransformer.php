<?php

namespace App\Transformer;
use App\DTO\PreguntaDTO;
use App\DTO\UserDataDTO;
use App\Entity\Pregunta;
use App\Entity\UsuariosRespuesta;
use App\Transformer\PreguntaTransformer;

class UserDataTransformer
{
    private PreguntaTransformer $preguntaTransformer;

    public function __construct(PreguntaTransformer $preguntaTransformer)
    {
        $this->preguntaTransformer = $preguntaTransformer;
    }
    
    public function toDTO(Array $data): array
    {
        $result = [];

        foreach ($data as $i => $item) {
            $preguntas = [];
            $dto = new UserDataDTO();
            $dto->setCompletado($item->getCompletado());
            foreach ($item->getChatPreguntas() as $i => $pregunta) {
                $preguntas[] = $this->preguntaTransformer->toDTO($pregunta->getPregunta(),  $pregunta->getRespuesta());
            }
            $dto->setPreguntas($preguntas);
            $dto->setProducto($item->getRecomendacion()->getProducto());
            $dto->setFecha($item->getFechaInicio());
            $result[] = $dto;
        }

        return $result;
    }
}